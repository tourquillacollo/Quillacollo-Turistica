<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use TUSIMO\Lugares;

class LocationTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_user_can_create_locations()
    {
        $location = new Lugares(['nombre' => 'Test',
            'type' => 'Ecologico',
            'datos_referencia' => 'Datos de prueba',
            'ubicacion'=>'Ubicacion de prueba',
            'latitud' => '22.54522',
            'longitud' => '22.56223']);

        $this->assertEquals('Test', $location->nombre);
    }
}
