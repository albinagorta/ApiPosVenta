<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\models\Base;
use App\models\User;
class Categoria extends Base
{
    use HasFactory;
    protected $fillable = ["nombre" , "fh_crea", "fh_update", "user_crea", "user_update", "in_estado"];

    public function usuario_crea()
    {
      return $this->belongsTo(User::class, 'user_crea', 'id');
    }

    public function usuario_update()
    {
      return $this->belongsTo(User::class, 'user_update', 'id');
    }

}
