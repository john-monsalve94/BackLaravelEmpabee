<?php

namespace App\Http\Middleware;

use App\Models\Controlador;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VerifySensorUUID
{

    public function handle(Request $request, Closure $next): Response
    {
        $uuid = $request->header('X-Sensor-UUID');

        if (!$uuid) {
            return response()->json(['error' => 'No se envió una llave correcta (X-Sensor-UUID)'], 400);
        }

        $controlador = Controlador::where('uuid', $uuid)->first();

        if (!$controlador || $controlador->trashed()) {
            return response()->json(['error' => 'Controlador no encontrado o eliminado'], 404);
        }

        return $next($request);
    }

}
