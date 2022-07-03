<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;
    protected $fillable = ["nombre" , "fh_crea", "fh_update", "user_crea", "user_update", "in_estado"];
}
