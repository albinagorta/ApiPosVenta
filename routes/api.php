<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\api\V1\CategoriaController as CategoriaV1;


//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::controller(CategoriaV1::class)->group(function (){
    Route::get('/v1/categorias','index');
    Route::post('/v1/categoria','store');
    Route::get('/v1/categoria/{id}','show');
    Route::put('/v1/categoria/{id}','update');
    // Route::post('/v1/category/{id}','in_estado');// in_estado
});

//Route::apiResource('v1/category', CategoriaV1::class)
//    ->only(['index', 'show', 'update', 'store', 'destroy']);