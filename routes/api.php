<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\v1\ProductController as ProductosV1; 
use App\Http\Controllers\Api\v1\VentaController as VentaV1; 
use App\Http\Controllers\Api\v1\SliderController as SliderV1; 
use App\Http\Controllers\Api\LoginController as Login;
/* Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
}); */
//*****  PRODUCTOS  *************/
Route::apiResource('v1/products',ProductosV1::class)
->middleware(['auth:sanctum']);

/****** PRIMEROS 10 PRODUCTOS PARA NIÑOS ********/
Route::get('v1/productos/ninos',[ProductosV1::class,'sliderProductosNinos']);

/****  SLIDER  *******/
Route::get('v1/slider',[SliderV1::class,'getSlider']);

Route::group(['middleware' => ['cors']], function () {
    Route::post('login',[Login::class,'login']);
});

Route::post('login',[Login::class,'login']);

/* Route::get('logout',[Login::class,'logout']); */

/**VENTA*/
Route::POST('venta',[VentaV1::class,'vender']);
