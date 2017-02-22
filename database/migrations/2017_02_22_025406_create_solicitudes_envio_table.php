<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSolicitudesEnvioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solicitudes_envio', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('id_producto_comprado')->unsigned()->unique();
            $table->foreign('id_producto_comprado')->references('id')->on('producto_comprados')
                ->onDelete('cascade');

            $table->integer('id_direccion_destino')->unsigned()->nullable();
            $table->foreign('id_direccion_destino')->references('id')->on('direcciones')
                ->onDelete('set null');

            $table->date('fecha_entrega_estimada')->nullable();
            $table->float('distancia_destino')->nullable();

            $table->integer('id_usuario_solicitante')->unsigned()->nullable();
            $table->foreign('id_usuario_solicitante')->references('id')->on('usuarios')
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
        Schema::dropIfExists('solicitudes_envio');
    }
}
