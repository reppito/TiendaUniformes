<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUnidadesTransporteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unidades_transporte', function (Blueprint $table) {
            $table->increments('id');
            $table->char('matricula', 8)->unique();
            $table->string('marca');
            $table->string('modelo');
            $table->smallInteger('ano');
            $table->integer('cantidad_maxima_productos');
            $table->boolean('activa');

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
        Schema::dropIfExists('unidades_transporte');
    }
}
