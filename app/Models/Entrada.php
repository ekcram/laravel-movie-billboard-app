<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entrada extends Model
{
    use HasFactory;

    protected $fillable = [
        'cantidad',
        'pelicula_id',
        'pelicula_título',
        'user_id',
        'user_name'
    ];
}
