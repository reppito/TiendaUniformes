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
           'privilegio'=> 'moderador'
         ]);

        DB::table('privilegios')->insert([
        	'privilegio'=> 'moderador'

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



    }
    	
    
}
