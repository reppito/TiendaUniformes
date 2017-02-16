<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMateriaPrimaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materia_prima', function (Blueprint $table){
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('descripcion');
            $table->decimal('precio');
            $table->integer('id_prov')->unsigned();
            $table->foreign('id_prov')->references('id')->on('proveedores');
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
        Schema::dropIfExists('materia_prima');
    }
}
