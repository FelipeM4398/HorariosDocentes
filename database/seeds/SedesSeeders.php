<?php

use Illuminate\Database\Seeder;

class SedesSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sedes')->insert(['id' => 1, 
                                    'nombre' => 'Norte', 
                                    'direccion' => 'Avenida 6 Norte #28N–102']);
        DB::table('sedes')->insert(['id' => 2, 
                                    'nombre' => 'Sur',
                                    'direccion' => 'Calle 25 #127–220']);
    }
}
