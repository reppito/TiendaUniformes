<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Carbon\Carbon;

class TablaUnidadesTransporteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('unidades_transporte')->insert([
        	  'matricula' => Str::upper(str_random(7))
        	, 'marca' => 'Chevrolet'
        	, 'modelo' => 'Cruze'
        	, 'ano' => '2000'
        	, 'cantidad_maxima_productos' => '50'
        	, 'activa' => '1'
            , 'disponible' => '1'
            , 'created_at' => Carbon::now()
            , 'updated_at' => Carbon::now()
        ]);

        DB::table('unidades_transporte')->insert([
        	  'matricula' => Str::upper(str_random(7))
        	, 'marca' => 'Ford'
        	, 'modelo' => 'Fiesta'
        	, 'ano' => '2006'
        	, 'cantidad_maxima_productos' => '51'
        	, 'activa' => '1'
            , 'disponible' => '1'
            , 'created_at' => Carbon::now()
            , 'updated_at' => Carbon::now()
        ]);

        DB::table('unidades_transporte')->insert([
        	  'matricula' => Str::upper(str_random(7))
        	, 'marca' => 'Honda'
        	, 'modelo' => 'Civic'
        	, 'ano' => '2000'
        	, 'cantidad_maxima_productos' => '52'
        	, 'activa' => '1'
            , 'disponible' => '1'
            , 'created_at' => Carbon::now()
            , 'updated_at' => Carbon::now()
        ]);

        DB::table('unidades_transporte')->insert([
        	  'matricula' => Str::upper(str_random(7))
        	, 'marca' => 'Mercedez'
        	, 'modelo' => 'CLK'
        	, 'ano' => '1998'
        	, 'cantidad_maxima_productos' => '51'
        	, 'activa' => '1'
            , 'disponible' => '1'
            , 'created_at' => Carbon::now()
            , 'updated_at' => Carbon::now()
        ]);

        DB::table('unidades_transporte')->insert([
        	  'matricula' => Str::upper(str_random(7))
        	, 'marca' => 'Jeep'
        	, 'modelo' => 'Renegade'
        	, 'ano' => '2016'
        	, 'cantidad_maxima_productos' => '54'
        	, 'activa' => '1'
            , 'disponible' => '1'
            , 'created_at' => Carbon::now()
            , 'updated_at' => Carbon::now()
        ]);

        DB::table('unidades_transporte')->insert([
        	  'matricula' => Str::upper(str_random(7))
        	, 'marca' => 'Toyota'
        	, 'modelo' => 'Corolla'
        	, 'ano' => '2010'
        	, 'cantidad_maxima_productos' => '100'
        	, 'activa' => '0'
            , 'disponible' => '1'
            , 'created_at' => Carbon::now()
            , 'updated_at' => Carbon::now()
        ]);
    }
}
