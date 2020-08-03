<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrabajoAsignado extends Model
{
    protected $fillable = ['estado', 'trabajo_id', 'user_id'];
}
