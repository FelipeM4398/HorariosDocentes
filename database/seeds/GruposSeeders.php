<?php

use Illuminate\Database\Seeder;

class GruposSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('grupos')->insert(['id' => 1, 
                                     'nombre' => 'SB141A',
                                     'id_programa' => 1,
                                     'id_jornada_academica' => 1,
                                     'id_sede' => 2]);
        DB::table('grupos')->insert(['id' => 2, 
                                     'nombre' => 'SB141B',
                                     'id_programa' => 1,
                                     'id_jornada_academica' => 1,
                                     'id_sede' => 2]);
        DB::table('grupos')->insert(['id' => 3, 
                                     'nombre' => 'SB141C',
                                     'id_programa' => 1,
                                     'id_jornada_academica' => 2,
                                     'id_sede' => 2]);
        DB::table('grupos')->insert(['id' => 4, 
                                     'nombre' => 'SB241',
                                     'id_programa' => 1,
                                     'id_jornada_academica' => 2,
                                     'id_sede' => 2]);
        DB::table('grupos')->insert(['id' => 5, 
                                     'nombre' => 'S241A',
                                     'id_programa' => 1,
                                     'id_jornada_academica' => 1,
                                     'id_sede' => 2]);
        DB::table('grupos')->insert(['id' => 6, 
                                     'nombre' => 'S241B',
                                     'id_programa' => 1,
                                     'id_jornada_academica' => 1,
                                     'id_sede' => 2]);
        DB::table('grupos')->insert(['id' => 7, 
                                     'nombre' => 'S341',
                                     'id_programa' => 1,
                                     'id_jornada_academica' => 1,
                                     'id_sede' => 2]);
        DB::table('grupos')->insert(['id' => 8,
                                     'nombre' => 'S441',
                                     'id_programa' => 1,
                                     'id_jornada_academica' => 1,
                                     'id_sede' => 2]);
        DB::table('grupos')->insert(['id' => 9,
                                     'nombre' => 'S541',
                                     'id_programa' => 1,
                                     'id_jornada_academica' => 1,
                                     'id_sede' => 2]);
        DB::table('grupos')->insert(['id' => 10,
                                     'nombre' => 'S641',
                                     'id_programa' => 1,
                                     'id_jornada_academica' => 1,
                                     'id_sede' => 2]);
        DB::table('grupos')->insert(['id' => 11,
                                     'nombre' => 'S741',
                                     'id_programa' => 1,
                                     'id_jornada_academica' => 1,
                                     'id_sede' => 2]);
        DB::table('grupos')->insert(['id' => 12,
                                     'nombre' => 'S841',
                                     'id_programa' => 1,
                                     'id_jornada_academica' => 1,
                                     'id_sede' => 2]);
        DB::table('grupos')->insert(['id' => 13,
                                     'nombre' => 'S941',
                                     'id_programa' => 1,
                                     'id_jornada_academica' => 1,
                                     'id_sede' => 2]);
        DB::table('grupos')->insert(['id' => 14,
                                     'nombre' => 'S941',
                                     'id_programa' => 1,
                                     'id_jornada_academica' => 1,
                                     'id_sede' => 2]);
        DB::table('grupos')->insert(['id' => 15,
                                     'nombre' => 'S1041',
                                     'id_programa' => 1,
                                     'id_jornada_academica' => 1,
                                     'id_sede' => 2]);
    }
}
