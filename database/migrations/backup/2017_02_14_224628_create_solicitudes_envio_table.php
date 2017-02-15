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
        Schema::create('solicitudes_envio'
            , function (Blueprint $table) {
                $table->engine = 'InnoDB';
                $table->increments('id');

                $table->integer('id_producto_comprado')->unsigned()->unique();
                $table->foreign('id_producto_comprado')->references('id')->on('producto_comprados')
                    ->onDelete('cascade');

                $table->integer('id_direccion_destino')->unsigned();
                $table->foreign('id_direccion_destino')->references('id')->on('direcciones')
                    ->onDelete('cascade');

                $table->dateTime('fecha_entrega_estimada');

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
