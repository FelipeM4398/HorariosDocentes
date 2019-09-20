<?php

use Illuminate\Database\Seeder;

class FacultadesSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('facultades')->insert(['id' => 1, 'nombre' => 'Facultad de Ingenierías',]);
        DB::table('facultades')->insert(['id' => 2, 'nombre' => 'Facultad Ciencias Empresariales',]);
        DB::table('facultades')->insert(['id' => 3, 
                                         'nombre' => 'Facultad Educación a Distancia y Virtual']);
        DB::table('facultades')->insert(['id' => 4, 'nombre' => 'Facultad Ciencias Sociales y Humanas',]);
        DB::table('facultades')->insert(['id' => 5, 'nombre' => 'Centro de Formación Técnica Laboral',]);
    }
}
