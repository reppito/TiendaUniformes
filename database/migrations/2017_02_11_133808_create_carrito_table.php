<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarritoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carritos', function (Blueprint $table) {
          $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('id_user')->unsigned();

            $table->integer('id_producto')->unsigned();

            $table->integer('cantidad');


            $table->timestamps();
        });
        Schema::table('carritos',function(Blueprint $table){
          $table->foreign('id_producto')->references('id')->on('productos');
          $table->foreign('id_user')->references('id')->on('usuarios');

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carritos');
    }
}
