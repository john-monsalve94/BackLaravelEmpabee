<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Pais;
use Illuminate\Http\Request;

class PaisController extends Controller
{

    public function index()
    {
        $paises = Pais::all();
        return response()->json($paises);
    }

}
