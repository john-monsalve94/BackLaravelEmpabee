<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Produccion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProduccionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $producciones = Produccion::whereHas('siembra.colmena',function($query){
            $query -> where('user_id',Auth::id());
        })->latest()->paginate();
        return view('produccion',['producciones'=>$producciones]);
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

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Produccion $produccion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produccion $produccion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Produccion $produccion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produccion $produccion)
    {
        //
    }
}
