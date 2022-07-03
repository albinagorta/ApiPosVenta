<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    use HasFactory;
    protected $fillable = [
        "id_cliente" ,
        "tipo_comprobante" ,
        "num_comprobante" ,
        "fh_crea" ,
        "user_crea" ,
        "descuento" ,
        "impuesto" ,
        "neto", 
        "total", 
        "metodo_pago", 
        "in_estado"
    ];

}
