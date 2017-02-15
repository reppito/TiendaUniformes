<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnviosPerdidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('envios_perdidos'
            , function (Blueprint $table) {
                $table->engine = 'InnoDB';
                $table->increments('id');

                $table->integer('id_envio_asignado')->unsigned()->unique();
                $table->foreign('id_envio_asignado')->references('id')->on('envios_asignados')
                    ->onDelete('cascade');

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
        Schema::dropIfExists('envios_perdidos');
    }
}
