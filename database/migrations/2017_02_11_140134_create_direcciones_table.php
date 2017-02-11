<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDireccionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('direcciones', function (Blueprint $table) {
        $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('id_user')->unsigned();

            $table->integer('zip_code');
            $table->string('estado',50);
            $table->string('ciudad',50);
            $table->string('calle',50);
            $table->string('detalles',120);
            $table->timestamps();
        });
        Schema::table('direcciones',function(Blueprint $table){
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
        Schema::dropIfExists('direcciones');
    }
}
