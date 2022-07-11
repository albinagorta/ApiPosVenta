<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\LoginController;
use App\Http\Controllers\api\V1\UserController as UserV1;
use App\Http\Controllers\api\V1\CategoriaController as CategoriaV1;
use App\Http\Controllers\api\V1\ProductoController as ProductoV1;
use App\Http\Controllers\api\V1\ClienteController as ClienteV1;
use App\Http\Controllers\api\V1\VentaController as VentaV1;

Route::post('login', [LoginController::class, 'login']);

Route::group( ['middleware' => ["auth:sanctum"]], function(){
    // USUARIOS
    Route::controller(UserV1::class)->group(function (){
        Route::get('/v1/usuario','index');
        Route::post('/v1/usuario','store');
        Route::get('/v1/usuario/{id}','show');
        Route::put('/v1/usuario/{id}','update');
    });

    // CATEGORIAS
    Route::controller(CategoriaV1::class)->group(function (){
            Route::get('/v1/categoria','index');
            Route::post('/v1/categoria','store');
            Route::get('/v1/categoria/{id}','show');
            Route::put('/v1/categoria/{id}','update');
            // Route::post('/v1/category/{id}','in_estado');// in_estado
    });

    // PRODUCTO
    Route::controller(ProductoV1::class)->group(function (){
        Route::get('/v1/producto','index');
        Route::post('/v1/producto','store');
        Route::get('/v1/producto/{id}','show');
        Route::put('/v1/producto/{id}','update');
    });

    // CLIENTE
    Route::controller(ClienteV1::class)->group(function (){
        Route::get('/v1/cliente','index');
        Route::post('/v1/cliente','store');
        Route::get('/v1/cliente/{id}','show');
        Route::put('/v1/cliente/{id}','update');
    });

    // VENTA
    Route::controller(VentaV1::class)->group(function (){
        Route::get('/v1/venta','index');
        Route::post('/v1/venta','store');
        Route::get('/v1/venta/{id}','show');
        Route::put('/v1/venta/{id}','update');
    });
    

});
