<?php

use Illuminate\Database\Seeder;

class DispoSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('disponibilidades_docentes')->insert(['id' => 1, 'id_docente' => 9, 'id_periodo' => 1]);
        DB::table('disponibilidades_docentes')->insert(['id' => 2, 'id_docente' => 10, 'id_periodo' => 1]);
        DB::table('disponibilidades_docentes')->insert(['id' => 3, 'id_docente' => 12, 'id_periodo' => 1]);
        DB::table('disponibilidades_docentes')->insert(['id' => 4, 'id_docente' => 13, 'id_periodo' => 1]);
        DB::table('disponibilidades_docentes')->insert(['id' => 5, 'id_docente' => 14, 'id_periodo' => 1]);
    }
}
