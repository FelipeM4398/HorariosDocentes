<?php

use Illuminate\Database\Seeder;

class ProgramasSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('programas')->insert([
            'id' => 1,
            'snies' => 91000,
            'nombre' => 'Ingeniería de Sistemas',
            'duracion' => 10,
            'id_modalidad' => 1,
            'id_facultad' => 1,
            'id_director' => 6,
            'id_tipo_programa' => 1
        ]);
        DB::table('programas')->insert([
            'id' => 2,
            'snies' => 91301,
            'nombre' => 'Ingeniería Electrónica',
            'duracion' => 10,
            'id_modalidad' => 1,
            'id_facultad' => 1,
            'id_director' => 7,
            'id_tipo_programa' => 1
        ]);
        DB::table('programas')->insert([
            'id' => 3,
            'snies' => 105521,
            'nombre' => 'Ingeniería Industrial',
            'duracion' => 10,
            'id_modalidad' => 1,
            'id_facultad' => 1,
            'id_director' => 8,
            'id_tipo_programa' => 1
        ]);
        DB::table('programas')->insert([
            'id' => 4,
            'snies' => 12198,
            'nombre' => 'Tecnología en Electrónica Industrial',
            'duracion' => 7,
            'id_modalidad' => 1,
            'id_facultad' => 1,
            'id_tipo_programa' => 2
        ]);
        DB::table('programas')->insert([
            'id' => 5,
            'snies' => 3551,
            'nombre' => 'Tecnología en Instrumentación Industrial',
            'duracion' => 7,
            'id_modalidad' => 1,
            'id_facultad' => 1,
            'id_tipo_programa' => 2
        ]);
        DB::table('programas')->insert([
            'id' => 6,
            'snies' => 103342,
            'nombre' => 'Tecnología en Mecatrónica Industrial',
            'duracion' => 7,
            'id_modalidad' => 1,
            'id_facultad' => 1,
            'id_tipo_programa' => 2
        ]);
        DB::table('programas')->insert([
            'id' => 7,
            'snies' => 102910,
            'nombre' => 'Tecnología en Sistemas de Información',
            'duracion' => 7,
            'id_modalidad' => 1,
            'id_facultad' => 1,
            'id_tipo_programa' => 2
        ]);
        DB::table('programas')->insert([
            'id' => 8,
            'snies' => 54538,
            'nombre' => 'Tecnología en Producción Industrial',
            'duracion' => 7,
            'id_modalidad' => 1,
            'id_facultad' => 1,
            'id_tipo_programa' => 2
        ]);
        DB::table('programas')->insert([
            'id' => 9,
            'snies' => 104199,
            'nombre' => 'Técnico Profesional en Registro y Control de Procesos Productivos',
            'duracion' => 4,
            'id_modalidad' => 4,
            'id_facultad' => 1,
            'id_tipo_programa' => 3
        ]);
    }
}
