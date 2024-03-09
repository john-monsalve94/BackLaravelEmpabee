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
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $relations = $request->query('relations');
        $colmenas = Colmena::with($relations??$this->relations)
            ->withoutTrashed()
            ->where('user_id', Auth::id())
            ->paginate();
        return response()->json($colmenas);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $start_date = Carbon::now();
        $count_colmenas = Colmena::where('user_id',Auth::id())->count();
        $colmena = Colmena::create([
            'nombre'=>'Colmena'.($count_colmenas+1),
            'fecha_inicio'=>$start_date
        ]);
        return response()->json($colmena);
    }

    /**
     * Display the specified resource.
     */
    public function show(Colmena $colmena)
    {
        return response()->json($colmena);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Colmena $colmena)
    {
        $colmena->update($request->all());
        return response()->json($colmena);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Colmena $colmena)
    {
        $colmena->delete();
        return response()->json(['message' => 'Colmena eliminada correctamente']);
    }
}
