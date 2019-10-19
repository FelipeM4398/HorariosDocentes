<?php

use Illuminate\Database\Seeder;

class PeriodosSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('periodos_academicos')->insert(['id' => 1, 'año' => '2019', 'periodo' => '2']);
    }
}
