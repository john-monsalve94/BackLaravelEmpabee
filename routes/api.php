<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\V1\ColmenaController as ColmenaV1;
use App\Http\Controllers\Api\V1\ControladorController as ControladorV1;
use App\Http\Controllers\Api\V1\MedidaController as MedidaV1;
use App\Http\Controllers\Api\V1\NotificacionController as NotificacionV1;
use App\Http\Controllers\Api\V1\PaisController as PaisV1;
use App\Http\Controllers\Api\V1\ProduccionController as ProduccionV1;
use App\Http\Controllers\Api\V1\ReporteController as ReporteV1;
use App\Http\Controllers\Api\V1\SiembraController as SiembraV1;
use App\Http\Middleware\VerifySensorUUID;
use Illuminate\Support\Facades\Route;

Route::group([

    'middleware' => 'auth:api',
    'prefix' => 'auth'

], function () {
    Route::post('login', [AuthController::class, 'login'])->withoutMiddleware('auth:api');
    Route::post('register', [AuthController::class, 'register'])->withoutMiddleware('auth:api');
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('perfil', [AuthController::class, 'perfil']);
});

Route::group([
    'prefix' => 'v1'
], function () {
    Route::group([
        'middleware' => 'auth:api',
    ], function () {
        Route::apiResource('colmenas', ColmenaV1::class)->names([
            'index' => 'colmena_api.index',
            'store' => 'colmena_api.store',
            'show' => 'colmena_api.show',
            'update' => 'colmena_api.update',
            'destroy' => 'colmena_api.destroy',
        ]);
        Route::get('reportes', [ReporteV1::class, 'index']);
        Route::apiResource('controladores',ControladorV1::class)->only(['index','store']);
        Route::delete('controladores',[ControladorV1::class,'destroy']);
        Route::apiResource('notificaciones',NotificacionV1::class)->only(['index','show']);
        Route::apiResource('medidas',MedidaV1::class)->only(['index']);
        Route::get('medidas/grafica',[MedidaV1::class,'all'])->name('medidas_api');
        Route::apiResource('siembras',SiembraV1::class)->only(['index','store']);
        Route::apiResource('producciones',ProduccionV1::class)->only(['index','store']);
        Route::get('producciones/grafica',[ProduccionV1::class,'all'])->name('producciones_api');
    });
    Route::group([
        'middleware' => [VerifySensorUUID::class],
    ], function () {
        Route::post('reportes', [ReporteV1::class, 'store']);
        Route::get('controladores/{uuid}', [ControladorV1::class, 'show']);
    });
    Route::apiResource('paises',PaisV1::class)->only(['index']);
    Route::apiResource('paises',PaisV1::class)->only(['index']);
    Route::apiResource('paises',PaisV1::class)->only(['index']);

});
