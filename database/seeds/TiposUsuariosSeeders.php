<?php

use Illuminate\Database\Seeder;

class TiposUsuariosSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipos_usuarios')->insert(['id' => 1, 'nombre' => 'Administrador',]);
        DB::table('tipos_usuarios')->insert(['id' => 2, 'nombre' => 'Decano',]);
        DB::table('tipos_usuarios')->insert(['id' => 3, 'nombre' => 'Director',]);
        DB::table('tipos_usuarios')->insert(['id' => 4, 'nombre' => 'Docente',]);
        DB::table('tipos_usuarios')->insert(['id' => 5, 'nombre' => 'Coordinación',]);
    }
}
