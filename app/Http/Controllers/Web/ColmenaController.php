<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Colmena;
use App\Models\Controlador;
use App\Models\Medida;
use App\Models\Produccion;
use App\Models\Reporte;
use App\Models\Sensor;
use App\Models\Siembra;
use App\Models\TipoSensor;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ColmenaController extends Controller
{
    public function index()
    {
        $colmenas = Colmena::withoutTrashed()->where('user_id', Auth::id())->latest()->paginate(15);
        return view('pages/colmenas/index', ['colmenas' => $colmenas]);
    }

    public function index_graficas(Colmena $colmena)
    {
        return redirect()->route('colmena_temperatura', ['colmena' => $colmena->id]);
    }

    public function temperatura(Colmena $colmena)
    {
        $medidas = Medida::whereHas('sensor.controlador', function ($query) use ($colmena) {
            $query->where('colmena_id', $colmena->id);
            $query->where('tipo_sensor_id', 3);
        })->latest()->paginate(10);
        return view('pages/colmenas/estado', ['medidas' => $medidas, 'colmena' => $colmena]);
    }

    public function peso(Colmena $colmena)
    {
        $medidas = Medida::whereHas('sensor.controlador', function ($query) use ($colmena) {
            $query->where('colmena_id', $colmena->id);
            $query->where('tipo_sensor_id', 2);
        })->latest()->paginate(10);
        return view('pages/colmenas/estado', ['medidas' => $medidas, 'colmena' => $colmena]);
    }

    public function humedad(Colmena $colmena)
    {
        $medidas = Medida::whereHas('sensor.controlador', function ($query) use ($colmena) {
            $query->where('colmena_id', $colmena->id);
            $query->where('tipo_sensor_id', 1);
        })->latest()->paginate(10);
        return view('pages/colmenas/estado', ['medidas' => $medidas, 'colmena' => $colmena]);
    }

    public function index_reportes(Colmena $colmena)
    {
        if ($colmena->user_id != Auth::id()) {
            abort(404);
        }
        $reportes = Reporte::whereHas('controlador.colmena', function ($query) use ($colmena) {
            $query->where('colmena_id', $colmena->id);
            $tipo = request()->query('tipo');
            if ($tipo) {
                $query->where('titulo_reporte', $tipo);
            }
        })->latest()->paginate(9);

        return view('pages/colmenas/reportes', ['colmena' => $colmena, 'reportes' => $reportes]);
    }

    public function configuracion(Colmena $colmena)
    {
        $controladores = Controlador::withoutTrashed()
            ->where('colmena_id', $colmena->id)
            ->latest()
            ->paginate(3);
        return view('pages/colmenas/configuracion', ['controladores' => $controladores, 'colmena' => $colmena]);
    }

    public function index_siembras(Colmena $colmena)
    {
        $siembras = Siembra::where('colmena_id',$colmena->id)->latest()->paginate(10);
        $produccion_miel = Produccion::whereHas('siembra',function($query) use ($colmena){
            $query->where('colmena_id',$colmena->id);
        })->sum('cantidad_miel');
        return view('pages/colmenas/siembras',['siembras'=>$siembras,'colmena'=>$colmena,'produccion_miel'=>$produccion_miel]);
    }

    public function store_siembra(Colmena $colmena)
    {
        Siembra::create(['colmena_id'=>$colmena->id]);
        return redirect()->route('colmena_siembras',['colmena'=>$colmena]);
    }

    public function create_extraccion(Colmena $colmena)
    {
        $siembras = Siembra::where('colmena_id',$colmena->id)->latest()->paginate(10);
        // return response()->json($siembras);
        return view('pages/colmenas/siembras',['siembras'=>$siembras,'colmena'=>$colmena]);
    }

    public function store_extraccion(Request $request,Colmena $colmena)
    {
        Produccion::create([
            'siembra_id'=>$colmena->siembras()->latest()->first()->id,
            'cantidad_miel'=>$request->input('cantidad_miel')
        ]);
        return redirect()->route('colmena_siembras',['colmena'=>$colmena]);
    }

    public function produccion(Colmena $colmena,Siembra $siembra)
    {
        $producciones = Produccion::whereHas('siembra.colmena',function($query) use ($siembra){
            $query -> where('user_id',Auth::id());
            $query->where('siembra_id',$siembra->id);
        })->latest()->paginate();
        return view('pages/colmenas/produccion',['producciones'=>$producciones,'siembra'=>$siembra,'colmena'=>$colmena]);
    }

    public function create()
    {
        //
    }

    public function create_controlador(Colmena $colmena)
    {
        $controlador = Controlador::create(['colmena_id' => $colmena->id]);
        $tipo_sensores_id = TipoSensor::pluck('id')->toArray();
        foreach ($tipo_sensores_id as $tipo_sensor_id) {
            Sensor::factory()->create([
                'tipo_sensor_id' => $tipo_sensor_id,
                'controlador_id' => $controlador->uuid
            ]);
        }
        return  redirect()->route('colmenas.configuracion', ['colmena' => $colmena->id]);
    }

    public function store()
    {
        $start_date = Carbon::now();
        $count_colmenas = Colmena::where('user_id', Auth::id())->count();
        Colmena::create([
            'nombre' => 'Colmena' . ($count_colmenas + 1),
            'fecha_inicio' => $start_date
        ]);
        return redirect()->route('colmenas.index');
    }

    public function show(Colmena $colmena)
    {
        return redirect()->route('colmena_reportes', ['colmena' => $colmena->id]);
    }

    public function edit(Colmena $colmena)
    {
        $controladores = Controlador::withoutTrashed()
            ->where('colmena_id', $colmena->id)
            ->latest()
            ->paginate(3);
        return view('pages/colmenas/configuracion', ['controladores' => $controladores, 'colmena' => $colmena]);
    }

    public function update(Request $request, Colmena $colmena)
    {
        $colmena->update($request->all());
        return  redirect()->route('colmenas.configuracion', ['colmena' => $colmena->id]);
    }

    public function destroy(Colmena $colmena)
    {
        $colmena->delete();
        return redirect()->route('colmenas.index');
    }
}
