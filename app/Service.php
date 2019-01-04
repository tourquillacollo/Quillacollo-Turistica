<?php

namespace TUSIMO;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'service_name',
        'type',
        'detail',
        'address',
        'telephone'
    ];

    public function Lugares() {
        return $this->belongsTo('TUSIMO\Lugares');
    }
}
