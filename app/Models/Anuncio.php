<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Anuncio extends Model
{
    protected $fillable = [
        'carrera',
        'anuncio',
        'categoria',
        'fecha_inicio',
        'fecha_finalizacion',
    ];
}
