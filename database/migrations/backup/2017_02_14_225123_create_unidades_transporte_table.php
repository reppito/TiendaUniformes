<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUnidadesTransporteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unidades_transporte'
            , function (Blueprint $table) {
                $table->engine = 'InnoDB';
                $table->increments('id');
                $table->string('matricula_vehiculo')->unique();
                $table->string('marca_vehiculo');
                $table->string('modelo_vehiculo');
                $table->integer('ano_vehiculo');
                $table->integer('cantidad_maxima_productos');
                $table->boolean('activa');
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
        Schema::dropIfExists('unidades_transporte');
    }
}
