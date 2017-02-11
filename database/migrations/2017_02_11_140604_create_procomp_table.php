<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProcompTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('producto_comprados', function (Blueprint $table) {
           $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('id_factura')->unsigned();

            $table->integer('id_producto')->unsigned();

            $table->integer('cantidad')->unsigned();


            $table->timestamps();
        });
        Schema::table('producto_comprados',function(Blueprint $table){
          $table->foreign('id_factura')->references('id')->on('facturas');
          $table->foreign('id_producto')->references('id')->on('productos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('producto_comprados');
    }
}
