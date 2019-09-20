<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('usuarios')->insert(['id' => 1,
                                       'identificacion' => 1144205319,
                                       'nombres' => 'Luis Felipe',
                                       'apellidos' => 'Muñoz Castañeda',
                                       'telefono' => '3177287425',
                                       'email' => 'luisf4398@hotmail.com',
                                       'password' => Hash::make('Felipe7'),
                                       'id_tipo_usuario' => 1]);
    }
}
