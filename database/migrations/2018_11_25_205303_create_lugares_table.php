<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLugaresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lugares', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->enum('type', ['Historico', 'Arqueologico', 'Religioso', 'Ecologico']);
            $table->double('latitud');
            $table->double('longitud');
            $table->longText('datos_referencia');
            $table->string('ubicacion');
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
        Schema::dropIfExists('lugares');
    }
}
