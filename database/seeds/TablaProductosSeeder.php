<?php

use Illuminate\Database\Seeder;
use \TiendaUniformes\TipoProducto;
use Illuminate\Support\Str;
use Carbon\Carbon;

class TablaProductosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$contador = 0;

    	foreach (TipoProducto::all() as $tipoProducto) {
	    	DB::table('productos')->insert([
	        	  'id_tipo' => $tipoProducto->id
	        	, 'descripcion' => 'Descripción de producto nro. ' . $contador
	        	, 'disponibles' => rand(50, 100)
	        	, 'precio' => rand(15000, 50000)
	        	, 'path' => '/ruta/a/imagen/de/producto'
	            , 'created_at' => Carbon::now()
	            , 'updated_at' => Carbon::now()
	        ]);
	        $contador = $contador + 1;
    	}
    }
}
