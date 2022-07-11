<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\models\Base;
use App\models\Producto;
class Detalle_venta extends Base
{
    use HasFactory;
    protected $fillable = [
        "id_venta" ,
        "id_producto" ,
        "cantidad" ,
        "preciou" ,
        "subtotal" 
    ];

    public function producto()
    {
      return $this->belongsTo(Producto::class, 'id_producto');
    }
    
}
