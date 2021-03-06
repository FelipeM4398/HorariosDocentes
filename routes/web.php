<?php

include 'disponibilidad/disponibilidad.routes.php';
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth/login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/register', 'Auth\RegisterController@index')->name('register');

Route::resource('/asignaturas', 'AsignaturasController');
Route::resource('/informacion', 'InformacionController');
Route::resource('/usuarios', 'UsuariosController');
Route::resource('/disponibilidad', 'DisponibilidadController')->parameters(['disponibilidad' => 'usuario']);
Route::resource('/programas', 'ProgramasController');
