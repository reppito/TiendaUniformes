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
        Schema::create('solicitudes_envio_rechazadas'
            , function (Blueprint $table) {
                $table->engine = 'InnoDB';
                $table->increments('id');

                $table->integer('id_solicitud_envio')->unsigned()->unique();
                $table->foreign('id_solicitud_envio')->references('id')->on('solicitudes_envio')
                    ->onDelete('cascade');

                $table->string('razon');

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
