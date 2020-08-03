<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PermisoDenegadoPorRol extends Model
{
    protected $fillable = ['rol_id', 'permiso_id'];
}
