<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(TablaPrivilegiosSeeder::class);
        $this->call(TablaUsuarioSeeder::class);
        $this->call(TablaConductoresSeeder::class);
        $this->call(TablaUnidadesTransporteSeeder::class);
        $this->call(TablaTipoProductosSeeder::class);
        $this->call(TablaProductosSeeder::class);
        $this->call(TablaFacturasSeeder::class);
        $this->call(TablaProductosCompradosSeeder::class);
        $this->call(TablaDireccionesSeeder::class);
        $this->call(TablaSolicitudesEnvioSeeder::class);
    }
}
