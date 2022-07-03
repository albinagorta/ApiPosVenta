<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detalle_venta extends Model
{
    use HasFactory;
    protected $fillable = [
        "id_venta" ,
        "id_producto" ,
        "cantidad" ,
        "preciou" ,
        "subtotal" 
    ];
    
}
