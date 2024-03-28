<?php

use App\Http\Controllers\Api\V1\MedidaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Web\ColmenaController;
use App\Http\Controllers\web\DashboardController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('pages/colmenas/home');
});

Route::get('/notificacion', function () {
    return view('pages/pruebas/notificacion',['user_id'=>Auth::id()]);
})->middleware(['auth']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('colmenas', ColmenaController::class);

    Route::group([
        'prefix'=>'dashboard'
    ],function(){
        Route::controller(DashboardController::class)->group(function(){
            Route::get('/','index')->name('dashboard');
            Route::get('temperatura','temperatura')->name('dashboard_temperatura');
            Route::get('peso','peso')->name('dashboard_peso');
            Route::get('humedad','humedad')->name('dashboard_humedad');
        });
    });

    Route::get('medidas',[MedidaController::class,'all'])->name('medidas_web');
});

require __DIR__.'/auth.php';
