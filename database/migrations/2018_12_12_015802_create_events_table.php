<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo');
            $table->enum('tipo', ['Religiosos', 'Culturales', 'Gastronomicos']);
            $table->integer('latitud');
            $table->integer('longitud');
            $table->date('fecha_ini');
            $table->date('fecha_fin');
            $table->longText('detalle');
            $table->string('location');
            $table->integer('rate')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
}
