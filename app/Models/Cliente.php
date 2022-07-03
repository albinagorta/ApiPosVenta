<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;
    protected $fillable = [
        "nombre" ,
        "tipo_documento" ,
        "num_documento" ,
        "email" ,
        "telefono" ,
        "direccion" ,
        "fh_crea", 
        "fh_update", 
        "user_crea", 
        "user_update", 
        "in_estado"
    ];
}
