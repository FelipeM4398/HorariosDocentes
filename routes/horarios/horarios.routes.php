<?php

Route::get('horarios', 'HorariosController@index')
    ->name('horarios.index');

Route::get('horarios/create', 'HorariosController@create')
    ->name('horarios.create');

Route::get('horarios/show/{horario}', 'HorariosController@show')
    ->name('horarios.show');

Route::get('horarios/edit/{horario}', 'HorariosController@edit')
    ->name('horarios.edit');

Route::get('horarios/create/dias', 'HorariosController@createDias')
    ->name('horarios.createDias');

Route::post('horarios/store', 'HorariosController@store')
    ->name('horarios.store');

Route::post('horarios/update/{horario}', 'HorariosController@update')
    ->name('horarios.update');

Route::get('horarios/grupos', 'HorariosController@listGrupos');
Route::get('horarios/dias', 'HorariosController@listDias');

Route::get('horarios/dispo/{periodo}/{docente}/{dia}', 'HorariosController@dispo');
Route::get('horarios/{periodo}/docentes', 'HorariosController@listDocentes');
Route::get('horarios/{docente}/asignaturas', 'HorariosController@listAsignaturas');

Route::get('horarios/export', 'HorariosController@export')
    ->name('horarios.export');
