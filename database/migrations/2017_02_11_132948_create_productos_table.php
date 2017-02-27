<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
          $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('id_tipo')->unsigned();
            
            $table->string('descripcion');
            $table->integer('disponibles');
            $table->decimal('precio',8,3);


            $table->timestamps();
        });
        Schema::table('productos',function(Blueprint $table){
            $table->foreign('id_tipo')->references('id')->on('tipo_productos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productos');
    }
}
