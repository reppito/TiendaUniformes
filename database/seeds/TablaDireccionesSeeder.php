<?php

use Illuminate\Database\Seeder;
use \TiendaUniformes\Usuario;
use Carbon\Carbon;

class TablaDireccionesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$contador = 0;

    	foreach (Usuario::all() as $usuario) {
	        DB::table('direcciones')->insert([
	        	'id_user' => $usuario->id
		      , 'zip_code' => rand(10000, 99999)
		      , 'estado' => 'Estado ' . $contador
		      , 'ciudad' => 'Ciudad ' . $contador
		      , 'calle' => 'Calle nro. ' . $contador
		      , 'detalles' => 'Descripción nro. ' . $contador
		      , 'created_at' => Carbon::now()
		      , 'updated_at' => Carbon::now()
		    ]);
	    	$contador = $contador + 1;
		}
    }
}
