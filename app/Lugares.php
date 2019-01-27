<?php

namespace TUSIMO;

use Illuminate\Database\Eloquent\Model;

class Lugares extends Model
{
    protected $fillable = [
        'nombre',
        'type',
        'latitud',
        'longitud',
        'datos_referencia',
        'ubicacion',
        'rate'
    ];

    public function imagenes() {
        return $this->hasMany('TUSIMO\Imagenes');
    }

    public function services() {
        return $this->hasMany('TUSIMO\Service');
    }

    public function comments()
    {
        return $this->hasMany('TUSIMO\Comment');
    }
}
