<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRutasTransporteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rutas_transporte', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('id_unidad_transporte')->unsigned();
            $table->foreign('id_unidad_transporte')->references('id')->on('unidades_transporte')
                ->onDelete('cascade');

            $table->integer('id_conductor')->unsigned();
            $table->foreign('id_conductor')->references('id')->on('conductores')
                ->onDelete('cascade');

            $table->integer('id_solicitud_envio_aceptada')->unsigned();
            $table->foreign('id_solicitud_envio_aceptada')->references('id')->on('solicitudes_envio_aceptadas')
                ->onDelete('cascade');

            $table->integer('id_usuario_creador')->unsigned()->nullable();
            $table->foreign('id_usuario_creador')->references('id')->on('usuarios')
                ->onDelete('set null');  

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
        Schema::dropIfExists('rutas_transporte');
    }
}
