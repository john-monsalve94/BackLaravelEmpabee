<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Colmena;
use App\Models\Produccion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProduccionController extends Controller
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
        $limit = $request->query('limit', 10);
        $siembra_id = $request->query('siembra_id');
        $producciones = Produccion::with($relations);

        if (isset($siembra_id)) {
            $producciones = $producciones->where('siembra_id', $siembra_id);
        }
        $producciones = $producciones->latest()
            ->paginate($limit, ['*'], 'page', $page);

        $data = $producciones->items();
        $currentPage = $producciones->currentPage();
        $totalPages = $producciones->lastPage();

        return response()->json([
            'data' => $data,
            'current_page' => $currentPage,
            'total_pages' => $totalPages,
        ]);
    }

    public function all(Request $request)
    {
        $siembra_id = $request->query('siembra_id');

        $producciones = Produccion::select(
            DB::raw('MONTH(created_at) as mes'), // Extrae el mes de la fecha de creación
            DB::raw('YEAR(created_at) as anio'), // Extrae el año de la fecha de creación
            DB::raw('SUM(cantidad_miel) as suma_miel') // Calcula la suma de la cantidad de miel producida
        );

        if (isset($siembra_id)) {
            $producciones = $producciones->where('siembra_id', $siembra_id);
        }

        $producciones = $producciones->groupBy('mes', 'anio') // Agrupa por mes y año
            ->orderBy('anio', 'asc') // Ordena por año ascendente
            ->orderBy('mes', 'asc') // Ordena por mes ascendente
            ->get();

        return response()->json($producciones);
    }

    public function store(Request $request)
    {
        $colmena = Colmena::find($request->input('colmena_id'));
        $produccion = Produccion::create([
            'siembra_id'=>$colmena->siembras()->latest()->first()->id,
            'cantidad_miel'=>$request->input('cantidad_miel')
        ]);
        return response()->json($produccion);
    }
}
