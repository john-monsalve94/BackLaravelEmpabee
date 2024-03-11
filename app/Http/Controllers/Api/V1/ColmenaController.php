<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Colmena;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ColmenaController extends Controller
{
    private $relations;

    public function __construct()
    {
        $this->relations = [];
    }

    public function index(Request $request)
    {
        $relations = $request->query('relations',$this->relations);
        $page = $request->query('page',1);
        $limit = $request->query('limit',2);
        $colmenas = Colmena::with($relations)
            ->withoutTrashed()
            ->where('user_id', Auth::id())
            ->latest()
            ->paginate($limit,['*'],'page',$page);

            $data = $colmenas->items();
            $currentPage = $colmenas->currentPage();
            $totalPages = $colmenas->lastPage();
        
            return response()->json([
                'data' => $data,
                'current_page' => $currentPage,
                'total_pages' => $totalPages,
            ]);
    }

    public function store()
    {
        $start_date = Carbon::now();
        $count_colmenas = Colmena::where('user_id',Auth::id())->count();
        $colmena = Colmena::create([
            'nombre'=>'Colmena'.($count_colmenas+1),
            'fecha_inicio'=>$start_date
        ]);
        return response()->json($colmena);
    }

    public function show(Colmena $colmena)
    {
        return response()->json($colmena);
    }

    public function update(Request $request, Colmena $colmena)
    {
        $colmena->update($request->all());
        return response()->json($colmena);
    }

    public function destroy(Colmena $colmena)
    {
        $colmena->delete();
        return response()->json(['message' => 'Colmena eliminada correctamente']);
    }
}
