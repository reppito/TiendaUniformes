<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class TablaTipoProductosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipo_productos')->insert([
        	  'nombre_producto' => 'Camisa'
            , 'created_at' => Carbon::now()
            , 'updated_at' => Carbon::now()
        ]);

        DB::table('tipo_productos')->insert([
        	  'nombre_producto' => 'Pantalones'
            , 'created_at' => Carbon::now()
            , 'updated_at' => Carbon::now()
        ]);

        DB::table('tipo_productos')->insert([
        	  'nombre_producto' => 'Zapatos'
            , 'created_at' => Carbon::now()
            , 'updated_at' => Carbon::now()
        ]);

        DB::table('tipo_productos')->insert([
        	  'nombre_producto' => 'Mono'
            , 'created_at' => Carbon::now()
            , 'updated_at' => Carbon::now()
        ]);

        DB::table('tipo_productos')->insert([
        	  'nombre_producto' => 'Camiseta'
            , 'created_at' => Carbon::now()
            , 'updated_at' => Carbon::now()
        ]);
    }
}
