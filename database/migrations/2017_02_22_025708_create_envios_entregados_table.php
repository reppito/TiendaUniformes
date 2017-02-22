<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnviosEntregadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('envios_entregados', function (Blueprint $table) {
            $table->increments('id');

            $table->dateTime('fecha_reporte_entrega')->nullable();
            
            $table->integer('id_solicitud_envio_aceptada')->unsigned();
            $table->foreign('id_solicitud_envio_aceptada')->references('id')->on('solicitudes_envio_aceptadas')
                ->onDelete('cascade');

            $table->integer('id_usuario_que_reporta')->unsigned()->nullable();
            $table->foreign('id_usuario_que_reporta')->references('id')->on('usuarios')
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
        Schema::dropIfExists('envios_entregados');
    }
}
