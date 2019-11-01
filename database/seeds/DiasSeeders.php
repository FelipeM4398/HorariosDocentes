<?php

use Illuminate\Database\Seeder;

class DiasSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('dias')->insert(['id' => 1, 'nombre' => 'Lunes',]);
        DB::table('dias')->insert(['id' => 2, 'nombre' => 'Martes',]);
        DB::table('dias')->insert(['id' => 3, 'nombre' => 'Miércoles',]);
        DB::table('dias')->insert(['id' => 4, 'nombre' => 'Jueves',]);
        DB::table('dias')->insert(['id' => 5, 'nombre' => 'Viernes',]);
        DB::table('dias')->insert(['id' => 6, 'nombre' => 'Sábado',]);
    }
}
