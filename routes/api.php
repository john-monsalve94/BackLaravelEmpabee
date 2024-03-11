<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\V1\ColmenaController as ColmenaV1;
use App\Http\Controllers\Api\V1\ReporteController as ReporteV1;
use App\Http\Middleware\VerifySensorUUID;
use Illuminate\Support\Facades\Route;

Route::group([

    'middleware' => 'auth:api',
    'prefix' => 'auth'

], function () {
    Route::post('login', [AuthController::class, 'login'])->withoutMiddleware('auth:api');
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('perfil', [AuthController::class, 'perfil']);
});

Route::group([
    'prefix' => 'v1'
], function () {
    Route::group([
        'middleware' => 'auth:api',
    ], function () {
        Route::apiResource('colmenas', ColmenaV1::class);
        Route::get('reportes', [ReporteV1::class, 'index']);
    });
    Route::group([
        'middleware' => [VerifySensorUUID::class],
    ], function () {
        Route::post('reportes', [ReporteV1::class, 'store']);
    });
});
