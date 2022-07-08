<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\models\Base;
class Producto extends Base
{
    use HasFactory;
    protected $fillable = [
        "id_categoria" ,
        "nombre" ,
        "codigo" ,
        "descripcion" ,
        "imagen" ,
        "stock" ,
        "precio" ,
        "fh_crea", 
        "fh_update", 
        "user_crea", 
        "user_update", 
        "in_estado"
    ];
}
