<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\models\Categoria;
use App\models\User;
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

    public function categoria()
    {
      return $this->belongsTo(Categoria::class, 'id_categoria', 'id');
    }

    public function usuario_crea()
    {
      return $this->belongsTo(User::class, 'user_crea', 'id');
    }

    public function usuario_update()
    {
      return $this->belongsTo(User::class, 'user_update', 'id');
    }

}
