<?php

use Illuminate\Database\Seeder;

class TablaPrivilegiosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('privilegios')->insert([
           'privilegio'=> 'Usuario'
         ]);

        DB::table('privilegios')->insert([
           'privilegio'=> 'Moderador'
         ]);

        DB::table('privilegios')->insert([
        	'privilegio'=> 'AdministradorTienda'
        	]);

        DB::table('privilegios')->insert([
        	'privilegio'=> 'AdministradorInventario'
        	]);

        DB::table('privilegios')->insert([
        	'privilegio'=> 'AdministradorEnvio'
        	]);

        DB::table('privilegios')->insert([
            'privilegio'=> 'AdministradorGlobal'
            ]);

    }
}
