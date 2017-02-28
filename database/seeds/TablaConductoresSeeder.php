<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class TablaConductoresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('conductores')->insert([
        	  'cedula' => '20000000'
        	, 'nombre' => 'Amanda'
        	, 'apellido' => 'Zabala'
        	, 'fecha_nacimiento' => '1994-07-13'
        	, 'fecha_inicio_contrato' => '2016-01-01'
        	, 'grado_licencia_conducir' => '5'
        	, 'activo' => '1'
            , 'created_at' => Carbon::now()
            , 'updated_at' => Carbon::now()
        ]);

        DB::table('conductores')->insert([
        	  'cedula' => '20000001'
        	, 'nombre' => 'Beto'
        	, 'apellido' => 'Cuevas'
        	, 'fecha_nacimiento' => '1994-07-14'
        	, 'fecha_inicio_contrato' => '2016-01-02'
        	, 'grado_licencia_conducir' => '4'
        	, 'activo' => '1'
            , 'created_at' => Carbon::now()
            , 'updated_at' => Carbon::now()
        ]);

        DB::table('conductores')->insert([
        	  'cedula' => '20000002'
        	, 'nombre' => 'Carlos'
        	, 'apellido' => 'Ramírez'
        	, 'fecha_nacimiento' => '1994-08-13'
        	, 'fecha_inicio_contrato' => '2017-01-01'
        	, 'grado_licencia_conducir' => '3'
        	, 'activo' => '1'
            , 'created_at' => Carbon::now()
            , 'updated_at' => Carbon::now()
        ]);

        DB::table('conductores')->insert([
        	  'cedula' => '20000003'
        	, 'nombre' => 'Juan'
        	, 'apellido' => 'Peralta'
        	, 'fecha_nacimiento' => '1995-07-13'
        	, 'fecha_inicio_contrato' => '2016-02-02'
        	, 'grado_licencia_conducir' => '4'
        	, 'activo' => '1'
            , 'created_at' => Carbon::now()
            , 'updated_at' => Carbon::now()
        ]);

        DB::table('conductores')->insert([
        	  'cedula' => '20000004'
        	, 'nombre' => 'John'
        	, 'apellido' => 'Doe'
        	, 'fecha_nacimiento' => '1994-08-14'
        	, 'fecha_inicio_contrato' => '2017-01-02'
        	, 'grado_licencia_conducir' => '5'
        	, 'activo' => '0'
            , 'created_at' => Carbon::now()
            , 'updated_at' => Carbon::now()
        ]);
    }
}
