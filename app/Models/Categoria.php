<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\models\Base;
class Categoria extends Base
{
    use HasFactory;
    protected $fillable = ["nombre" , "fh_crea", "fh_update", "user_crea", "user_update", "in_estado"];
}
