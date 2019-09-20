<?php

use Illuminate\Database\Seeder;

class AsignaturasSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('asignaturas')->insert(['id' => 1, 
                                          'codigo' => 'CB012102',
                                          'nombre' => 'Matemáticas Básicas', 
                                          'creditos' => 4]);
        DB::table('asignaturas')->insert(['id' => 2, 
                                          'codigo' => 'CB012103',
                                          'nombre' => 'Lógica y Razonamiento', 
                                          'creditos' => 3]);
        DB::table('asignaturas')->insert(['id' => 3, 
                                          'codigo' => 'CB013101',
                                          'nombre' => 'Comunicación y Lenguaje I', 
                                          'creditos' => 3]);
        DB::table('asignaturas')->insert(['id' => 4, 
                                          'codigo' => 'CB014109',
                                          'nombre' => 'Cátedra Institucional', 
                                          'creditos' => 2]);
        DB::table('asignaturas')->insert(['id' => 5, 
                                          'codigo' => 'FI303201',
                                          'nombre' => 'Introducción a la Ingeniería de Sistemas', 
                                          'creditos' => 2]);
        DB::table('asignaturas')->insert(['id' => 6, 
                                          'codigo' => 'CB014102',
                                          'nombre' => 'Medio Ambiente', 
                                          'creditos' => 3]);
        DB::table('asignaturas')->insert(['id' => 7, 
                                          'codigo' => 'CB012108',
                                          'nombre' => 'Algebra Lineal', 
                                          'creditos' => 4]);
        DB::table('asignaturas')->insert(['id' => 8, 
                                          'codigo' => 'CB012104',
                                          'nombre' => 'Cálculo Diferencial', 
                                          'creditos' => 3]);
        DB::table('asignaturas')->insert(['id' => 9, 
                                          'codigo' => 'CB014103',
                                          'nombre' => 'Humanidades I', 
                                          'creditos' => 1]);
        DB::table('asignaturas')->insert(['id' => 10, 
                                          'codigo' => 'CB012109',
                                          'nombre' => 'Matemáticas Discretas', 
                                          'creditos' => 4]);
        DB::table('asignaturas')->insert(['id' => 11, 
                                          'codigo' => 'FI303200',
                                          'nombre' => 'Introducción al Análisis y Solución de Problemas', 
                                          'creditos' => 2]);
        DB::table('asignaturas')->insert(['id' => 12, 
                                          'codigo' => 'FI303203',
                                          'nombre' => 'Progrmación I', 
                                          'creditos' => 3]);
        DB::table('asignaturas')->insert(['id' => 13, 
                                          'codigo' => 'FI303202',
                                          'nombre' => 'Principios de economía', 
                                          'creditos' => 3]);
        DB::table('asignaturas')->insert(['id' => 14, 
                                          'codigo' => 'CB012105',
                                          'nombre' => 'Cálculo Integral',
                                          'creditos' => 3]);
        DB::table('asignaturas')->insert(['id' => 15, 
                                          'codigo' => 'CB014101',
                                          'nombre' => 'Fisica I',
                                          'creditos' => 3]);
        DB::table('asignaturas')->insert(['id' => 16, 
                                          'codigo' => 'FI303378',
                                          'nombre' => 'Liderazgo y Emprendimiento',
                                          'creditos' => 2]);
        DB::table('asignaturas')->insert(['id' => 17, 
                                          'codigo' => 'FI303204',
                                          'nombre' => 'Programación II',
                                          'creditos' => 3]);
        DB::table('asignaturas')->insert(['id' => 18, 
                                          'codigo' => 'FI303301',
                                          'nombre' => 'Seminario de Sistemas',
                                          'creditos' => 3]);
        DB::table('asignaturas')->insert(['id' => 19, 
                                          'codigo' => 'CB012106',
                                          'nombre' => 'Cálculo Vectorial',
                                          'creditos' => 3]);
        DB::table('asignaturas')->insert(['id' => 20, 
                                          'codigo' => 'CB015102',
                                          'nombre' => 'Física II',
                                          'creditos' => 3]);
        DB::table('asignaturas')->insert(['id' => 21, 
                                          'codigo' => 'FI303209',
                                          'nombre' => 'Ingeniería de Software I',
                                          'creditos' => 3]);
        DB::table('asignaturas')->insert(['id' => 22, 
                                          'codigo' => 'FI303223',
                                          'nombre' => 'Fundamentos Web',
                                          'creditos' => 3]);
        DB::table('asignaturas')->insert(['id' => 23, 
                                          'codigo' => 'FI303205',
                                          'nombre' => 'Programación III',
                                          'creditos' => 3]);
        DB::table('asignaturas')->insert(['id' => 24, 
                                          'codigo' => 'CB012111',
                                          'nombre' => 'Estadistica I',
                                          'creditos' => 3]);
        DB::table('asignaturas')->insert(['id' => 25, 
                                          'codigo' => 'CB013102',
                                          'nombre' => 'Comunicación y Lenguaje II',
                                          'creditos' => 3]);
    }
}
