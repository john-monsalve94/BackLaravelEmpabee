<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Municipio;
use Illuminate\Http\Request;

class MunicipioController extends Controller
{

    public function index(Request $request)
    {
        $departamento_id = $request->query('departamento_id');
        $municipios = Municipio::where('municipio_id',$departamento_id)->get();
        return response()->json($municipios);
    }

}
