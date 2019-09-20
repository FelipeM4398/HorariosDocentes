<?php

use Illuminate\Database\Seeder;

class TiposProgramasSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipos_programas')->insert(['id' => 1, 'nombre' => 'Universitario',]);
        DB::table('tipos_programas')->insert(['id' => 2, 'nombre' => 'Tecnológico',]);
        DB::table('tipos_programas')->insert(['id' => 3, 'nombre' => 'Técnico',]);
        DB::table('tipos_programas')->insert(['id' => 4, 'nombre' => 'Posgrado',]);
    }
}
