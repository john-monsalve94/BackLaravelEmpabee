<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Departamento;
use Illuminate\Http\Request;

class DepartamentoController extends Controller
{

    public function index(Request $request)
    {
        $pais_id = $request->query('pais_id');
        $departamentos = Departamento::where('pais_id',$pais_id)->get();
        return response()->json($departamentos);
    
    }

}
