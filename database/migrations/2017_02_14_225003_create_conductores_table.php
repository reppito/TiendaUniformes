<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConductoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conductores'
            , function (Blueprint $table) {
                $table->engine = 'InnoDB';
                $table->increments('id');
                $table->string('cedula_identidad', 10)->unique();
                $table->string('nombre');
                $table->string('apellido');
                $table->boolean('activo');
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
        Schema::dropIfExists('conductores');
    }
}
