<?php

use Illuminate\Database\Seeder;
use \TiendaUniformes\Factura;
use \TiendaUniformes\Producto;
use Carbon\Carbon;

class TablaProductosCompradosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (Factura::all() as $factura) {
			DB::table('producto_comprados')->insert([
	        	  'id_factura' => $factura->id
	        	, 'id_producto' => Producto::all()->random()->id
	        	, 'cantidad' => rand(10, 20)
	            , 'created_at' => Carbon::now()
	            , 'updated_at' => Carbon::now()
	        ]);        	
        }
    }
}
