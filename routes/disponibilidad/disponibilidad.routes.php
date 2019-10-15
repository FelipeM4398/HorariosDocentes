<?php

Route::get('disponibilidad/usuario/{usuario}', 'DisponibilidadController@dispo')
    ->name('disponibilidad.usuario');
