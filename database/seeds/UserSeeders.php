<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'id' => 1,
            'identificacion' => 1144205319,
            'nombres' => 'Luis Felipe',
            'apellidos' => 'Muñoz Castañeda',
            'telefono' => '3177287425',
            'email' => 'luisf4398@hotmail.com',
            'password' => Hash::make('Felipe7'),
            'id_tipo_usuario' => 1
        ]);
        DB::table('users')->insert([
            'id' => 2,
            'identificacion' => 31949787,
            'nombres' => 'Edwin Jair',
            'apellidos' => 'Nuñez Ortiz',
            'telefono' => '3177354678',
            'email' => 'enunez@hotmail.com',
            'password' => Hash::make('Felipe7'),
            'id_tipo_usuario' => 2
        ]);
        DB::table('users')->insert([
            'id' => 3,
            'identificacion' => 31757454,
            'nombres' => 'Francia Elena',
            'apellidos' => 'Amelines Chamorro',
            'telefono' => '3167899876',
            'email' => 'famelines@hotmail.com',
            'password' => Hash::make('Felipe7'),
            'id_tipo_usuario' => 2
        ]);
        DB::table('users')->insert([
            'id' => 4,
            'identificacion' => 31121345,
            'nombres' => 'María Isabel',
            'apellidos' => 'Afanador Rodriguez',
            'telefono' => '3154443211',
            'email' => 'mafanador@hotmail.com',
            'password' => Hash::make('Felipe7'),
            'id_tipo_usuario' => 2
        ]);
        DB::table('users')->insert([
            'id' => 5,
            'identificacion' => 31567343,
            'nombres' => 'Octavio Augusto',
            'apellidos' => 'Calvache Salazar',
            'telefono' => '3168997765',
            'email' => 'ocalvache@hotmail.com',
            'password' => Hash::make('Felipe7'),
            'id_tipo_usuario' => 2
        ]);
        DB::table('users')->insert([
            'id' => 6,
            'identificacion' => 31545678,
            'nombres' => 'William',
            'apellidos' => 'Diaz Sepulveda',
            'telefono' => '3146789987',
            'email' => 'wdiz@hotmail.com',
            'password' => Hash::make('Felipe7'),
            'id_tipo_usuario' => 3
        ]);
        DB::table('users')->insert([
            'id' => 7,
            'identificacion' => 31789098,
            'nombres' => 'Guillermo David',
            'apellidos' => 'Núñez',
            'telefono' => '3132456798',
            'email' => 'gdavid@hotmail.com',
            'password' => Hash::make('Felipe7'),
            'id_tipo_usuario' => 3
        ]);
        DB::table('users')->insert([
            'id' => 8,
            'identificacion' => 31343671,
            'nombres' => 'Walter',
            'apellidos' => 'Donneys',
            'telefono' => '3146789987',
            'email' => 'wdonneys@hotmail.com',
            'password' => Hash::make('Felipe7'),
            'id_tipo_usuario' => 3
        ]);
        DB::table('users')->insert([
            'id' => 9,
            'identificacion' => 31431232,
            'nombres' => 'John Wilman',
            'apellidos' => 'Mondragon Males',
            'telefono' => '3134567689',
            'email' => 'jmondragon@hotmail.com',
            'password' => Hash::make('Felipe7'),
            'id_tipo_contrato' => 1,
            'id_tipo_usuario' => 4
        ]);
        DB::table('users')->insert([
            'id' => 10,
            'identificacion' => 31567864,
            'nombres' => 'Tania Isadora',
            'apellidos' => 'Mora Pedreros',
            'telefono' => '3134567609',
            'email' => 'timora@hotmail.com',
            'password' => Hash::make('Felipe7'),
            'id_tipo_contrato' => 1,
            'id_tipo_usuario' => 4
        ]);
        DB::table('users')->insert([
            'id' => 11,
            'identificacion' => 31456789,
            'nombres' => 'Javier',
            'apellidos' => 'Cortez Carvajal',
            'telefono' => '3176543412',
            'email' => 'jcortez@hotmail.com',
            'password' => Hash::make('Felipe7'),
        ]);
        DB::table('users')->insert([
            'id' => 12,
            'identificacion' => 31232456,
            'nombres' => 'Ademir',
            'apellidos' => 'Lucumí Villegas',
            'telefono' => '3177896754',
            'email' => 'alucumi@hotmail.com',
            'password' => Hash::make('Felipe7'),
            'id_tipo_contrato' => 1,
            'id_tipo_usuario' => 4
        ]);
        DB::table('users')->insert([
            'id' => 13,
            'identificacion' => 31565741,
            'nombres' => 'Milton Fabian',
            'apellidos' => 'Castaño Muñoz',
            'telefono' => '3176789854',
            'email' => 'mfcastano@hotmail.com',
            'password' => Hash::make('Felipe7'),
            'id_tipo_contrato' => 1,
            'id_tipo_usuario' => 4
        ]);
        DB::table('users')->insert([
            'id' => 14,
            'identificacion' => 31565876,
            'nombres' => 'Alexander',
            'apellidos' => 'Arévalo Soto',
            'telefono' => '3156786436',
            'email' => 'aarevalo@hotmail.com',
            'password' => Hash::make('Felipe7'),
            'id_tipo_contrato' => 1,
            'id_tipo_usuario' => 4
        ]);
        DB::table('users')->insert([
            'id' => 15,
            'identificacion' => 31123987,
            'nombres' => 'Paulo cesar',
            'apellidos' => 'Realpe Muñoz',
            'telefono' => '3176543412',
            'email' => 'prealpe@hotmail.com',
            'password' => Hash::make('Felipe7'),
        ]);
    }
}
