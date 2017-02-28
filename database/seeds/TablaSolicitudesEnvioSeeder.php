<?php

use Illuminate\Database\Seeder;
use \TiendaUniformes\Factura;
use \TiendaUniformes\ProductoComprado;
use \TiendaUniformes\Direccion;
use Carbon\Carbon;

class TablaSolicitudesEnvioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (ProductoComprado::all() as $productoComprado) {
        	$idUsuario = Factura::where('id', $productoComprado->id_factura)->first()->id_usuario;
        	$fecha = Carbon::now();

        	DB::table('solicitudes_envio')->insert([
	        	  'id_producto_comprado' => $productoComprado->id
	        	, 'id_direccion_destino' => Direccion::where('id_user', $idUsuario)->first()->id
	        	, 'fecha_entrega_estimada' => $fecha->addDays(rand(1, 60))
	        	, 'distancia_destino' => rand(1, 10000)
	        	, 'id_usuario_solicitante' => $idUsuario
	            , 'created_at' => Carbon::now()
	            , 'updated_at' => Carbon::now()
	        ]);
        }
    }
}
