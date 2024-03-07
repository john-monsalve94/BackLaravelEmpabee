<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\V1\ColmenaController;
use Illuminate\Support\Facades\Route;

Route::group([

    'middleware' => 'auth:api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', [AuthController::class,'login'])->withoutMiddleware('auth:api');
    Route::post('logout', [AuthController::class,'logout']);
    Route::post('perfil', [AuthController::class,'perfil']);

});

Route::group([
    'prefix'=>'v1'
],function ($router){
    Route::apiResource('colmenas',ColmenaController::class)->middleware('auth:api');
});

