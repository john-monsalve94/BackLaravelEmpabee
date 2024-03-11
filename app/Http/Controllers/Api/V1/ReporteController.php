<?php

namespace App\Http\Controllers\Api\V1;

use App\Enums\ReportStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\Reporte\ReporteByColmenaRequest;
use App\Http\Requests\Reporte\StoreReporteRequest;
use App\Models\Controlador;
use App\Models\Medida;
use App\Models\Reporte;
use Illuminate\Http\Request;

class ReporteController extends Controller
{
    private $relations;

    public function __construct()
    {
        $this->relations = [];
    }

    public function index(ReporteByColmenaRequest $request)
    {
        $relations = $request->query('relations', $this->relations);
        $page = $request->query('page', 1);
        $limit = $request->query('limit', 2);
        $colmena_id = $request->query('colmena_id');

        $reportes = Reporte::with($relations)->whereHas('controlador', function ($query) use ($colmena_id) {
            $query->where('colmena_id', $colmena_id);
        })->latest()->paginate($limit, ['*'], 'page', $page);

        $data = $reportes->items();
        $currentPage = $reportes->currentPage();
        $totalPages = $reportes->lastPage();

        return response()->json([
            'data' => $data,
            'current_page' => $currentPage,
            'total_pages' => $totalPages,
        ]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $controlador_id = $request->header('X-Sensor-UUID');

        $reporte = Reporte::create(['controlador_id' => $controlador_id]);

        $medidas_set = $request->input('medidas');

        foreach ($medidas_set as $medidas_sensor) {
            $sensor_id = $medidas_sensor['sensor'];
            $medidas = $medidas_sensor['medidas'];
            foreach ($medidas as $medida) {
                Medida::create([
                    'valor' => $medida,
                    'reporte_id' => $reporte->id,
                    'sensor_id' => $sensor_id
                ]);
            }
        }
        $estado_reporte = $this->report_status($reporte);
        
        $reporte->update($estado_reporte);
        $reporte->load('medidas');
        return response()->json($reporte);
    }

    /**
     * Display the specified resource.
     */
    public function show(Reporte $reporte)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reporte $reporte)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reporte $reporte)
    {
        //
    }

    private function report_status(Reporte $reporte): array
    {
        $colmena = $reporte->controlador->colmena;
        $titulo_reporte = ReportStatus::INFO;

        if ($colmena->temperatura_minima !== null && $colmena->temperatura_maxima !== null) {
            $dif_temperatura = $colmena->temperatura_maxima - $colmena->temperatura_minima;

            if (
                $reporte->promedio_temperatura < $colmena->temperatura_minima ||
                $reporte->promedio_temperatura > $colmena->temperatura_maxima
            ) {
                $titulo_reporte = ReportStatus::ALERTA;
            } elseif (($colmena->temperatura_maxima - $reporte->promedio_temperatura) >= 0.5 * $dif_temperatura ||
                ($reporte->promedio_temperatura - $colmena->temperatura_minima) >= 0.7 * $dif_temperatura
            ) {
                $titulo_reporte = ReportStatus::ADVERTENCIA;
            }
        }

        if ($colmena->peso_minimo !== null && $colmena->peso_maximo !== null) {
            if ($reporte->promedio_peso < 0.75 * $colmena->peso_minimo) {
                $titulo_reporte = ReportStatus::ALERTA;
            } elseif ($reporte->promedio_peso < 0.5 * $colmena->peso_minimo) {
                $titulo_reporte = ReportStatus::ADVERTENCIA;
            }
        }

        if ($colmena->humedad_minima !== null && $colmena->humedad_maxima !== null) {
            $dif_humedad = $colmena->humedad_maxima - $colmena->humedad_minima;

            if (
                $reporte->promedio_humedad < $colmena->humedad_minima ||
                $reporte->promedio_humedad > $colmena->humedad_maxima
            ) {
                $titulo_reporte = ReportStatus::ALERTA;
            } elseif (($colmena->humedad_maxima - $reporte->promedio_humedad) >= 0.5 * $dif_humedad ||
                ($reporte->promedio_humedad - $colmena->humedad_minima) >= 0.7 * $dif_humedad
            ) {
                $titulo_reporte = ReportStatus::ADVERTENCIA;
            }
        }

        $reporte->titulo_reporte = $titulo_reporte;

        $estado_reporte = $reporte->toArray();
        unset(
            $estado_reporte['promedio_temperatura'],
            $estado_reporte['promedio_peso'],
            $estado_reporte['promedio_humedad'],
            $estado_reporte['controlador']
        );
        return $estado_reporte;
    }
}
