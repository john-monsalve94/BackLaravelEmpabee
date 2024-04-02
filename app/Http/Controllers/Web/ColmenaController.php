<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Colmena;
use App\Models\Medida;
use App\Models\Reporte;
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
                $query->where('titulo_reporte',$tipo);
            }
        })->latest()->paginate(9);

        return view('pages/colmenas/reportes', ['colmena' => $colmena, 'reportes' => $reportes]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
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
        //
    }

    public function update(Request $request, Colmena $colmena)
    {
        //
    }

    public function destroy(Colmena $colmena)
    {
        //
    }
}
