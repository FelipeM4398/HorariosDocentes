<?php

use Illuminate\Database\Seeder;

class TiposSalonesSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipos_salones')->insert(['id' => 1, 'nombre' => 'Aula',]);
        DB::table('tipos_salones')->insert(['id' => 2, 'nombre' => 'Sala',]);
        DB::table('tipos_salones')->insert(['id' => 3, 'nombre' => 'Auditorio',]);
        DB::table('tipos_salones')->insert(['id' => 4, 'nombre' => 'Laboratorio Física',]);
        DB::table('tipos_salones')->insert(['id' => 5, 'nombre' => 'Laboratorio Electrónica',]);
        DB::table('tipos_salones')->insert(['id' => 6, 'nombre' => 'Laboratorio Química',]);
        DB::table('tipos_salones')->insert(['id' => 7, 'nombre' => 'Laboratorio Producción',]);
        DB::table('tipos_salones')->insert(['id' => 8, 'nombre' => 'Laboratorio Didáctica',]);
    }
}
