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
            $table->integer('cantidad');
            $table->decimal('precio_total');
            $table->integer('id_materia')->unsigned();
            $table->foreign('id_materia')->references('id')->on('materia_prima');
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
