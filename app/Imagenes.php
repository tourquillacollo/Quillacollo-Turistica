<?php

namespace TUSIMO;

use Illuminate\Database\Eloquent\Model;

class Imagenes extends Model
{
    protected $fillable = [
        'lugares_id',
        'ruta_imagen',
        'principal'
    ];


    public function Lugares() {
            return $this->belongsTo('TUSIMO\Lugares');
    }
}
