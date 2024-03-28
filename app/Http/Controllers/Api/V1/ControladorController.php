<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Controlador;
use App\Models\Sensor;
use App\Models\TipoSensor;
use Illuminate\Http\Request;

class ControladorController extends Controller
{

    private $relations;

    public function __construct()
    {
        $this->relations = [];
    }

    public function index(Request $request)
    {
        $relations = $request->query('relations', $this->relations);
        $page = $request->query('page', 1);
        $limit = $request->query('limit', 2);
        $colmena_id = $request->query('colmena_id');

        $reportes = Controlador::with($relations)
            ->where('colmena_id', $colmena_id)
            ->latest()
            ->paginate($limit, ['*'], 'page', $page);

        $data = $reportes->items();
        $currentPage = $reportes->currentPage();
        $totalPages = $reportes->lastPage();

        return response()->json([
            'data' => $data,
            'current_page' => $currentPage,
            'total_pages' => $totalPages,
        ]);
    }

    public function store(Request $request)
    {
        $colmena_id = $request->input('colmena_id');
        $controlador = Controlador::create(['colmena_id' => $colmena_id]);
        $tipo_sensores_id = TipoSensor::pluck('id')->toArray();
        foreach ($tipo_sensores_id as $tipo_sensor_id) {
            Sensor::factory()->create([
                'tipo_sensor_id' => $tipo_sensor_id,
                'controlador_id' => $controlador->uuid
            ]);
        }
        return response()->json($controlador);
    }

    public function show(string $uuid)
    {
        $controlador = Controlador::with(['colmena', 'sensores'])
            ->where('uuid', $uuid)
            ->first();
        return response()->json($controlador);
    }

    public function destroy(string $uuid)
    {
        $controlador = Controlador::where('uuid', $uuid)->first();
        $controlador->delete();
        return response()->json(['message' => 'Controlador eliminado correctamente']);
    }
}
