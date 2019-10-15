<?php

use Illuminate\Database\Seeder;

class AsigDocentesSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('docentes_asignaturas')->insert([
            'id_docente' => 10,
            'id_asignatura' => 5
        ]);
        DB::table('docentes_asignaturas')->insert([
            'id_docente' => 10,
            'id_asignatura' => 21
        ]);
        DB::table('docentes_asignaturas')->insert([
            'id_docente' => 14,
            'id_asignatura' => 1
        ]);
        DB::table('docentes_asignaturas')->insert([
            'id_docente' => 14,
            'id_asignatura' => 2
        ]);
        DB::table('docentes_asignaturas')->insert([
            'id_docente' => 14,
            'id_asignatura' => 8
        ]);
        DB::table('docentes_asignaturas')->insert([
            'id_docente' => 14,
            'id_asignatura' => 19
        ]);
        DB::table('docentes_asignaturas')->insert([
            'id_docente' => 13,
            'id_asignatura' => 1
        ]);
        DB::table('docentes_asignaturas')->insert([
            'id_docente' => 13,
            'id_asignatura' => 14
        ]);
    }
}
