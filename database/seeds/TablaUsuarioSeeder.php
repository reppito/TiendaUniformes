<?php

use Illuminate\Database\Seeder;
use \TiendaUniformes\Privilegios;
use Carbon\Carbon;

class TablaUsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$privUsuario = Privilegios::firstOrCreate(['privilegio' => 'Usuario'])->id;
    	$privModerador = Privilegios::firstOrCreate(['privilegio' => 'Moderador'])->id;
        $privAdminTienda = Privilegios::firstOrCreate(['privilegio' => 'AdministradorTienda'])->id;
        $privAdminInventario = Privilegios::firstOrCreate(['privilegio' => 'AdministradorInventario'])->id;
        $privAdminEnvio = Privilegios::firstOrCreate(['privilegio' => 'AdministradorEnvio'])->id;
    	$privAdminGlobal = Privilegios::firstOrCreate(['privilegio' => 'AdministradorGlobal'])->id;      
		
		DB::table('usuarios')->insert([
        	  'nombre' => 'Miguel'
        	, 'apellido' => 'Contreras'
        	, 'cedula' => '24401758'
        	, 'id_privilegio' => $privAdminEnvio
        	, 'email' => 'migueldevelop@gmail.com'
        	, 'password' => '$2y$10$NrFNQbFlY8jn0azn9U6fsOSQm4p8uLq6McpngZuK3jui6gmdXtMr2'
        	, 'created_at' => Carbon::now()
        	, 'updated_at' => Carbon::now()
        ]);

        DB::table('usuarios')->insert([
              'nombre' => 'Rafael'
            , 'apellido' => 'Ramírez'
            , 'cedula' => '21000000'
            , 'id_privilegio' => $privAdminInventario
            , 'email' => 'rafaelramirez@gmail.com'
            , 'password' => '$2y$10$NrFNQbFlY8jn0azn9U6fsOSQm4p8uLq6McpngZuK3jui6gmdXtMr2'
            , 'created_at' => Carbon::now()
            , 'updated_at' => Carbon::now()
        ]);

        DB::table('usuarios')->insert([
              'nombre' => 'Raul'
            , 'apellido' => 'Córdova'
            , 'cedula' => '24707780'
            , 'id_privilegio' => $privAdminTienda
            , 'email' => 'reppito@gmail.com'
            , 'password' => '$2y$10$NrFNQbFlY8jn0azn9U6fsOSQm4p8uLq6McpngZuK3jui6gmdXtMr2'
            , 'created_at' => Carbon::now()
            , 'updated_at' => Carbon::now()
        ]);

    	DB::table('usuarios')->insert([
        	  'nombre' => 'Stefany'
        	, 'apellido' => 'Gafanho'
        	, 'cedula' => '19000000'
        	, 'id_privilegio' => $privUsuario
        	, 'email' => 'correoa@gmail.com'
        	, 'password' => '$2y$10$NrFNQbFlY8jn0azn9U6fsOSQm4p8uLq6McpngZuK3jui6gmdXtMr2'
        	, 'created_at' => Carbon::now()
        	, 'updated_at' => Carbon::now()
        ]);

        DB::table('usuarios')->insert([
        	  'nombre' => 'Carlos'
        	, 'apellido' => 'Slim'
        	, 'cedula' => '19000001'
        	, 'id_privilegio' => $privAdminGlobal
        	, 'email' => 'correob@gmail.com'
        	, 'password' => '$2y$10$NrFNQbFlY8jn0azn9U6fsOSQm4p8uLq6McpngZuK3jui6gmdXtMr2'
        	, 'created_at' => Carbon::now()
        	, 'updated_at' => Carbon::now()
        ]);

        DB::table('usuarios')->insert([
        	  'nombre' => 'Pedro'
        	, 'apellido' => 'Peña'
        	, 'cedula' => '19000002'
        	, 'id_privilegio' => $privAdminEnvio
        	, 'email' => 'correoc@gmail.com'
        	, 'password' => '$2y$10$NrFNQbFlY8jn0azn9U6fsOSQm4p8uLq6McpngZuK3jui6gmdXtMr2'
        	, 'created_at' => Carbon::now()
        	, 'updated_at' => Carbon::now()
        ]);
    }
}
