<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\Medida;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{

    public function index()
    {
        return redirect()->route('dashboard_temperatura');
    }

    public function temperatura()
    {
        $medidas = Medida::whereHas('sensor.controlador.colmena', function ($query) {
            $query->where('user_id', Auth::id());
            $query->where('tipo_sensor_id', 3);
        })->latest()->paginate(10);
        return view('dashboard',['medidas'=>$medidas,]);
    }

    public function peso()
    {
        $medidas = Medida::whereHas('sensor.controlador.colmena', function ($query) {
            $query->where('user_id', Auth::id());
            $query->where('tipo_sensor_id', 2);
        })->latest()->paginate(10);
        return view('dashboard',['medidas'=>$medidas,]);
    }

    public function humedad()
    {
        $medidas = Medida::whereHas('sensor.controlador.colmena', function ($query) {
            $query->where('user_id', Auth::id());
            $query->where('tipo_sensor_id', 1);
        })->latest()->paginate(10);
        return view('dashboard',['medidas'=>$medidas,]);
    }
}
