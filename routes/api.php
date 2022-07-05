<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\api\V1\CategoriaController as CategoriaV1;
use App\Http\Controllers\api\LoginController;


Route::post('login', [LoginController::class, 'login']);

Route::group( ['middleware' => ["auth:sanctum"]], function(){
    //rutas
    Route::get('/v1/categorias',[CategoriaV1::class,'index']);
});

// Route::controller(CategoriaV1::class)->group(function (){
//     Route::get('/v1/categorias','index');
//     Route::post('/v1/categoria','store');
//     Route::get('/v1/categoria/{id}','show');
//     Route::put('/v1/categoria/{id}','update');
//     // Route::post('/v1/category/{id}','in_estado');// in_estado
// });