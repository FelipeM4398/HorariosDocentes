<?php

use Illuminate\Database\Seeder;

class JornadasSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jornadas')->insert(['id' => 1, 'hora_inicio' => '07:00:00', 'hora_fin' => '10:00:00']);
        DB::table('jornadas')->insert(['id' => 2, 'hora_inicio' => '10:00:00', 'hora_fin' => '13:00:00']);
        DB::table('jornadas')->insert(['id' => 3, 'hora_inicio' => '13:00:00', 'hora_fin' => '18:00:00']);
        DB::table('jornadas')->insert(['id' => 4, 'hora_inicio' => '18:30:00', 'hora_fin' => '21:30:00']);
    }
}
