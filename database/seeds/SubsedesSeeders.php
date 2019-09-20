<?php

use Illuminate\Database\Seeder;

class SubsedesSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('subsedes')->insert(['id' => 1, 
                                       'nombre' => 'Casa Parque', 
                                       'direccion' => 'Calle 29 #6N-31']);
        DB::table('subsedes')->insert(['id' => 2, 
                                       'nombre' => 'Estación 1',
                                       'direccion' => 'Av. 3A #23CN-84']);
        DB::table('subsedes')->insert(['id' => 3, 
                                       'nombre' => 'Estación 2',
                                       'direccion' => 'Av. 3AN #23D-34']);
    }
}
