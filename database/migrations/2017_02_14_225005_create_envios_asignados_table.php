<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnviosAsignadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('envios_asignados'
            , function (Blueprint $table) {
                $table->engine = 'InnoDB';
                $table->increments('id');

                $table->integer('id_solicitud_envio')->unsigned()->unique();
                $table->foreign('id_solicitud_envio')->references('id')->on('solicitudes_envio')
                    ->onDelete('cascade');

                $table->integer('id_unidad_transporte')->unsigned();
                $table->foreign('id_unidad_transporte')->references('id')->on('unidades_transporte')
                    ->onDelete('restrict');

                $table->integer('id_conductor')->unsigned();
                $table->foreign('id_conductor')->references('id')->on('conductores')
                    ->onDelete('restrict');

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
        Schema::dropIfExists('envios_asignados');
    }
}
