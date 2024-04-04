<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Produccion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        return view('home',['producciones'=>$producciones]);
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
