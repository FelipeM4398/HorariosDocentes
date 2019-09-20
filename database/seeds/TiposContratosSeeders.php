<?php

use Illuminate\Database\Seeder;

class TiposContratosSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipos_contratos')->insert(['id' => 1, 'nombre' => 'Tiempo completo',]);
        DB::table('tipos_contratos')->insert(['id' => 2, 'nombre' => 'Hora cátedra',]);
    }
}
