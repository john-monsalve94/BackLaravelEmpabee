<?php

use App\Http\Controllers\Api\V1\MedidaController;
use App\Http\Controllers\Api\V1\ProduccionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Web\ColmenaController;
use App\Http\Controllers\Web\DashboardController;
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
    return redirect('home');
    // return 'Hola';
});

Route::get('home', function () {
    return view('home');
    // return 'Hola';
});

Route::get('sesion', function () {
    return view('sesion');
    // return 'Hola';s
});





Route::get('/notificacion', function () {
    return view('pages/pruebas/notificacion', ['user_id' => Auth::id()]);
})->middleware(['auth']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('colmenas', ColmenaController::class)->except('edit');
    Route::group([
        'prefix'=> 'colmenas/{colmena}'
    ],function(){
        Route::group([
            'prefix'=>'configuracion'
        ],function(){
            Route::get('/',[ColmenaController::class,'configuracion'])->name('colmenas.configuracion');
            Route::get('actualizar',[ColmenaController::class,'edit'])->name('colmenas.edit');
            Route::post('add_controlador',[ColmenaController::class,'create_controlador'])->name('colmenas.create_controlador');
        });
        Route::group([
            'prefix'=>'reportes'
        ],function(){
            Route::controller(ColmenaController::class)->group(function(){
                Route::get('/','index_reportes')->name('colmena_reportes');
            });
        });
        Route::group([
            'prefix'=>'siembras'
        ],function(){
            Route::controller(ColmenaController::class)->group(function(){
                Route::get('/','index_siembras')->name('colmena_siembras');
                Route::post('sembrar','store_siembra')->name('colmena_sembrar');
                Route::get('extraer','create_extraccion')->name('colmena_produccion.create');
                Route::post('extraer','store_extraccion')->name('colmena_produccion.store');
            });
        });
        Route::group([
            'prefix'=>'graficas'
        ],function(){
            Route::controller(ColmenaController::class)->group(function(){
                Route::get('/','index_graficas')->name('colmena_graficas');
                Route::get('temperatura','temperatura')->name('colmena_temperatura');
                Route::get('peso','peso')->name('colmena_peso');
                Route::get('humedad','humedad')->name('colmena_humedad');
            });
        });
    });

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
    Route::get('producciones/grafica',[ProduccionController::class,'all'])->name('producciones_web');
});

require __DIR__ . '/auth.php';
