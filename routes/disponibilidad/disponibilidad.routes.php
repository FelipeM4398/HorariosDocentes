<?php

Route::get('usuarios/periodos/{usuario}', 'DisponibilidadController@periodo')
    ->name('usuarios.disponibilidad');

Route::get('usuarios/periodos/{usuario}/{periodo}/disponibilidad', 'DisponibilidadController@dispo')
    ->name('periodo.disponibilidad');
