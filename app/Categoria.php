<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $fillable = ['nombre','descripcion', 'estado', 'habilidad_id', 'trabajo_id'];
}
