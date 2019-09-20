<?php

use Illuminate\Database\Seeder;

class ModalidadesSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('modalidades')->insert(['id' => 1, 'nombre' => 'Presencial',]);
        DB::table('modalidades')->insert(['id' => 2, 'nombre' => 'Distancia',]);
        DB::table('modalidades')->insert(['id' => 3, 'nombre' => 'Virtual',]);
        DB::table('modalidades')->insert(['id' => 4, 'nombre' => 'B-Learning',]);
    }
}
