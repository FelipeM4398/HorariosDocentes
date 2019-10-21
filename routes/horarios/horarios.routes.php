<?php

Route::get('horarios', 'HorariosController@index')
    ->name('horarios.index');

Route::get('horarios/create', 'HorariosController@create')
    ->name('horarios.create');
