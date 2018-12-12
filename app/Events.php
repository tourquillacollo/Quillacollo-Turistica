<?php

namespace TUSIMO;

use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
    protected $fillable = [
        'titulo',
        'tipo',
        'latitud',
        'longitud',
        'fecha_ini',
        'fecha_fin',
        'detalle'
    ];
}
