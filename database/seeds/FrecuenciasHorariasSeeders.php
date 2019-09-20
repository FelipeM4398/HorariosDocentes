<?php

use Illuminate\Database\Seeder;

class FrecuenciasHorariasSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('frecuencias_horarias')->insert(['id' => 1, 'nombre' => 'Semanal',]);
        DB::table('frecuencias_horarias')->insert(['id' => 2, 'nombre' => 'Quincenal',]);
    }
}
