<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('nombre');
            $table->string('apellido');
            $table->char('cedula',8)->unique();
            $table->integer('id_privilegio')->unsigned();

            $table->string('email',100)->unique();
            $table->string('password');

            $table->timestamps();

        });
            Schema::table('usuarios',function(Blueprint $table){
              $table->foreign('id_privilegio')->references('id')->on('privilegios');
            });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuarios');
    }
}
