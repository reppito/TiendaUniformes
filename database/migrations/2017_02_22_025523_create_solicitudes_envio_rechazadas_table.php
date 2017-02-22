<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSolicitudesEnvioRechazadasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solicitudes_envio_rechazadas', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('id_solicitud_envio')->unsigned()->unique();
            $table->foreign('id_solicitud_envio')->references('id')->on('solicitudes_envio')
                ->onDelete('cascade');

            $table->string('razon')->nullable();

            $table->integer('id_usuario_que_rechaza')->unsigned()->nullable();
            $table->foreign('id_usuario_que_rechaza')->references('id')->on('usuarios')
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
        Schema::dropIfExists('solicitudes_envio_rechazadas');
    }
}
