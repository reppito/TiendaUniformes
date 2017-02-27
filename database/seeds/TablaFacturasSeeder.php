<?php

use Illuminate\Database\Seeder;
use \TiendaUniformes\Usuario;
use Carbon\Carbon;

class TablaFacturasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	foreach (Usuario::all() as $usuario) {
	    	DB::table('facturas')->insert([
	        	  'id_usuario' => $usuario->id
	            , 'created_at' => Carbon::now()
	            , 'updated_at' => Carbon::now()
	        ]);

	    	DB::table('facturas')->insert([
	        	  'id_usuario' => $usuario->id
	            , 'created_at' => Carbon::now()
	            , 'updated_at' => Carbon::now()
	        ]);	        
    	}
    }
}
