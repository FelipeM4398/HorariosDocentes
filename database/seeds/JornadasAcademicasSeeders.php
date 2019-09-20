<?php

use Illuminate\Database\Seeder;

class JornadasAcademicasSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jornadas_academicas')->insert(['id' => 1, 'nombre' => 'Diurna',]);
        DB::table('jornadas_academicas')->insert(['id' => 2, 'nombre' => 'Nocturna',]);
        DB::table('jornadas_academicas')->insert(['id' => 3, 'nombre' => 'Sabatina',]);
    }
}
