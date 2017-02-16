<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInventarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('inventario', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->integer('cantidad');
            $table->integer('id_prov')->unsigned();
            $table->foreign('id_prov')->references('id')->on('proveedores');
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
        Schema::dropIfExists('inventario');
    }
}
