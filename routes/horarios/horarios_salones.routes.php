<?php

Route::get('horarios/salon', 'HorariosSalonesController@index')
    ->name('horarios_salones.index');

Route::get('horarios/salon/{horario}/edit', 'HorariosSalonesController@edit')
    ->name('horarios_salones.edit');

Route::put('horarios/salon/{horario}/update', 'HorariosSalonesController@update')
    ->name('horarios_salones.update');
