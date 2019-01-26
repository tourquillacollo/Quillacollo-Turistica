<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
            $table->text('content');
            $table->integer('parent_id')->unsigned()->nullable();
            $table->integer('lugares_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->boolean('like')->default(false);
            $table->integer('rate');
            $table->timestamps();

            $table->foreign('parent_id')->references('id')->on('comments');
            $table->foreign('lugares_id')->references('id')->on('lugares');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
