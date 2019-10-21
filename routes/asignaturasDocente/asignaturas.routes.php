<?php

Route::get('usuarios/asignaturas/{usuario}', 'AsignaturasController@showAsignaturasDocente')
    ->name('usuarios.asignaturas');

Route::get('usuarios/asignaturas', 'AsignaturasController@seleccionarAsignaturas')
    ->name('usuarios.selectAsignaturas');

Route::get('usuarios/asignaturas/seleccionar/{asignatura}', 'AsignaturasController@asociarAsignatura')
    ->name('usuarios.asociar');

Route::get('usuarios/asignaturas/eliminar/{asignatura}', 'AsignaturasController@eliminarAsignatura')
    ->name('usuarios.eliminar');
