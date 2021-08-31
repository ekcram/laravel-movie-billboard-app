<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelicula extends Model
{
    use HasFactory;

    public function entradas(){
        return $this->hasMany(Entrada::class);
    }

    protected $fillable=[
        'título',
        'descripción',
        'entradas_disp',
        'user_id'
    ];
}
