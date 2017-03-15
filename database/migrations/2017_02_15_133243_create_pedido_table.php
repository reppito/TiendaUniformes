<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePedidoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedido', function(Blueprint $table){
            $table->engine = 'InnoDB';
            $table->increments('id_pedido');
            $table->integer('cantidad1');
            $table->integer('cantidad2')->nullable();
            $table->integer('cantidad3')->nullable();
            $table->decimal('precio1');
            $table->decimal('precio2')->nullable();
            $table->decimal('precio3')->nullable();
            $table->decimal('precio_total');
            $table->datetime('fecha_pedido');
            $table->datetime('fecha_llegada');
            $table->integer('id_materia1')->unsigned();
            $table->foreign('id_materia1')->references('id')->on('materia_prima');
            $table->integer('id_materia2')->unsigned()->nullable();
            $table->foreign('id_materia2')->references('id')->on('materia_prima');
            $table->integer('id_materia3')->unsigned()->nullable();
            $table->foreign('id_materia3')->references('id')->on('materia_prima');
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
        Schema::dropIfExists('pedido');
    }
}
