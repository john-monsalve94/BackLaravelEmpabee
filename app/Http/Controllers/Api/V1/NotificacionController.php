<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Notificacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificacionController extends Controller
{

    private $relations;

    public function __construct()
    {
        $this->relations = [];
    }

    public function index(Request $request)
    {
        $estado = $request->query('estado', 'todas');
        $relations = $request->query('relations', $this->relations);
        $page = $request->query('page', 1);
        $limit = $request->query('limit', 10);

        $notificaciones = Notificacion::with($relations)
                ->where('user_id', Auth::id());

        switch ($estado) {
            case 'no_leidas':
                $notificaciones = $notificaciones -> where('leido',false);
                break;

            case 'leidas':
                $notificaciones = $notificaciones -> where('leido',true);
                break;
            
            default:
                break;
        }

        $notificaciones= $notificaciones ->latest()->paginate($limit, ['*'], 'page', $page);

        $data = $notificaciones->items();
        $currentPage = $notificaciones->currentPage();
        $totalPages = $notificaciones->lastPage();

        return response()->json([
            'data' => $data,
            'current_page' => $currentPage,
            'total_pages' => $totalPages,
        ]);
    }

    public function show(int $id)
    {
        $notificacion = Notificacion::find($id);
        $notificacion ->leido = true;
        $notificacion->update($notificacion->toArray());

        return response()->json($notificacion);
    }

}
