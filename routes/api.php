<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\api\V1\CategoryController as CategoryV1;


//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::controller(CategoryV1::class)->group(function (){
    Route::get('/v1/categories','index');
    Route::post('/v1/category','store');
    Route::get('/v1/category/{id}','show');
    Route::put('/v1/category/{id}','update');
    Route::delete('/v1/category/{id}','destroy');
});
//Route::apiResource('v1/category', CategoryV1::class)
//    ->only(['index', 'show', 'update', 'store', 'destroy']);