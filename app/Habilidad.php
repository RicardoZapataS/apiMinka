<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Habilidad extends Model
{
    protected $fillable = ['nombre', 'descripcion', 'estado', 'categoria_id'];
}
