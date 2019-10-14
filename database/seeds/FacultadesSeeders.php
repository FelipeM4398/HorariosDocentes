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
        DB::table('facultades')->insert([
            'id' => 1,
            'nombre' => 'Facultad de Ingenierías',
            'id_decano' => 2
        ]);
        DB::table('facultades')->insert([
            'id' => 2,
            'nombre' => 'Facultad Ciencias Empresariales',
            'id_decano' => 3
        ]);
        DB::table('facultades')->insert([
            'id' => 3,
            'nombre' => 'Facultad Educación a Distancia y Virtual',
            'id_decano' => 4
        ]);
        DB::table('facultades')->insert([
            'id' => 4,
            'nombre' => 'Facultad Ciencias Sociales y Humanas',
            'id_decano' => 5
        ]);
        DB::table('facultades')->insert([
            'id' => 5,
            'nombre' => 'Centro de Formación Técnica Laboral',
        ]);
    }
}
