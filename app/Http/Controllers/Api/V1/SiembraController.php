<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Siembra;
use Illuminate\Http\Request;

class SiembraController extends Controller
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
        $colmena_id = $request->query('colmena_id');

        $siembras = Siembra::with($relations)
            ->where('colmena_id', $colmena_id)
            ->latest()
            ->paginate($limit, ['*'], 'page', $page);

        $data = $siembras->items();
        $currentPage = $siembras->currentPage();
        $totalPages = $siembras->lastPage();

        return response()->json([
            'data' => $data,
            'current_page' => $currentPage,
            'total_pages' => $totalPages,
        ]);
    }


    public function store(Request $request)
    {
        $colmena_id = $request->input('colmena_id');
        $siembra = Siembra::create(['colmena_id'=>$colmena_id]);
        return response()->json($siembra);
    }

}
