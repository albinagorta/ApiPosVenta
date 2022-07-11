<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\models\Base;
use App\models\User;
use App\models\Cliente;
use App\models\Detalle_venta;
class Venta extends Base
{
    use HasFactory;
    protected $fillable = [
        "id_cliente" ,
        "tipo_comprobante" ,
        "num_comprobante" ,
        "fh_crea" ,
        "user_crea" ,
        "fh_update" ,
        "user_update" ,
        "descuento" ,
        "impuesto" ,
        "neto", 
        "total", 
        "metodo_pago", 
        "in_estado"
    ];

    public function usuario_crea()
    {
      return $this->belongsTo(User::class, 'user_crea', 'id');
    }

    public function cliente()
    {
      return $this->belongsTo(Cliente::class, 'id_cliente', 'id');
    }

    public function usuario_update()
    {
      return $this->belongsTo(User::class, 'user_update', 'id');
    }
    
    public function detalle_venta()
    {
        return $this->hasMany(Detalle_venta::class,'id_venta');
    }
}
