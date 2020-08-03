<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trabajo extends Model
{
    protected $fillable = ['nombre', 'descripcion', 'importe_ofertado', 'tiempo_limite', 'fecha_limite', 'estado', 'habilidad_id', 'categoria_id'];
}
