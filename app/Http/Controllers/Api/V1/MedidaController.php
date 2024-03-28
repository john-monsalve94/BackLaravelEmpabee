<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Medida;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MedidaController extends Controller
{

    private $relations;

    public function __construct()
    {
        $this->relations = ['sensor.tipo_sensor'];
    }

    public function index(Request $request)
    {
        $tipo = $request->query('tipo', "humedad");
        $relations = $request->query('relations', $this->relations);
        $page = $request->query('page', 1);
        $limit = $request->query('limit', 10);
        $colmena_id = $request->query('colmena_id');

        $medidas = Medida::with($relations);

        $medidas = $medidas->whereHas('sensor.controlador.colmena', function ($query) {
            $query->where('user_id', Auth::id());
        });

        if ($colmena_id !== null) {
            $medidas = $medidas->whereHas('sensor.controlador', function ($query) use ($colmena_id) {
                $query->where('colmena_id', $colmena_id);
            });
        }

        switch ($tipo) {
            case 'humedad':
                $medidas = $medidas->whereHas('sensor', function ($query) {
                    $query->where('tipo_sensor_id', 1);
                });
                break;

            case 'peso':
                $medidas = $medidas->whereHas('sensor', function ($query) {
                    $query->where('tipo_sensor_id', 2);
                });
                break;

            case 'temperatura':
                $medidas = $medidas->whereHas('sensor', function ($query) {
                    $query->where('tipo_sensor_id', 3);
                });
                break;

            default:
                break;
        }
        $medidas = $medidas->latest()->paginate($limit, ['*'], 'page', $page);

        $data = $medidas->items();
        $currentPage = $medidas->currentPage();
        $totalPages = $medidas->lastPage();

        return response()->json([
            'data' => $data,
            'current_page' => $currentPage,
            'total_pages' => $totalPages,
        ]);
    }

    public function all(Request $request)
    {
        $tipo = $request->query('tipo', "temperatura");
        $relations = $request->query('relations', $this->relations);
        $colmena_id = $request->query('colmena_id');

        $medidas = Medida::with($relations);

        $medidas = $medidas->whereHas('sensor.controlador.colmena', function ($query) {
            $query->where('user_id', Auth::id());
        });

        if ($colmena_id !== null) {
            $medidas = $medidas->whereHas('sensor.controlador', function ($query) use ($colmena_id) {
                $query->where('colmena_id', $colmena_id);
            });
        }

        switch ($tipo) {
            case 'humedad':
                $medidas = $medidas->whereHas('sensor', function ($query) {
                    $query->where('tipo_sensor_id', 1);
                });
                break;

            case 'peso':
                $medidas = $medidas->whereHas('sensor', function ($query) {
                    $query->where('tipo_sensor_id', 2);
                });
                break;

            case 'temperatura':
                $medidas = $medidas->whereHas('sensor', function ($query) {
                    $query->where('tipo_sensor_id', 3);
                });
                break;

            default:
                break;
        }
        $medidas = $medidas->latest()->get();


        return response()->json($medidas);
    }
}
