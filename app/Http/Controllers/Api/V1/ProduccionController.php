<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Produccion;
use Illuminate\Http\Request;

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
        $producciones = Produccion::with($relations)
            ->where('siembra_id', $siembra_id)
            ->latest()
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

    public function store(Request $request)
    {
        $produccion = Produccion::create($request->all());
        return response()->json($produccion);
    }
}
