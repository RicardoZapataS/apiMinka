<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    protected $fillable = ['nombre', 'descripcion', 'importe', 'tipo_servicio', 'estado', 'user_id', 'categoria_id', 'habilidad_id'];
}
