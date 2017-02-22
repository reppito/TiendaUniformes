<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSolicitudesEnvioAceptadasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solicitudes_envio_aceptadas', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('id_solicitud_envio')->unsigned();
            $table->foreign('id_solicitud_envio')->references('id')->on('solicitudes_envio')
                ->onDelete('cascade');

            $table->integer('cantidad_productos')->unsigned();

            $table->integer('id_usuario_que_acepta')->unsigned()->nullable();
            $table->foreign('id_usuario_que_acepta')->references('id')->on('usuarios')
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
        Schema::dropIfExists('solicitudes_envio_aceptadas');
    }
}
