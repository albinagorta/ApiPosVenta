<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\models\Base;

class Cliente extends Base
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

    public function usuario_crea()
    {
      return $this->belongsTo(User::class, 'user_crea', 'id');
    }

    public function usuario_update()
    {
      return $this->belongsTo(User::class, 'user_update', 'id');
    }
}
