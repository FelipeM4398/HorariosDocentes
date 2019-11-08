<?php

namespace App\Http\Controllers;

use App\Facultad;
use App\TipoUsuario;
use App\Programa;
use App\Asignatura;
use App\Salon;
use App\Usuario;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::user()) {
            $rol = TipoUsuario::query()->where('id', '=', Auth::user()->id_tipo_usuario)->first();
        } else {
            $rol = 'Invitado';
        }

        $programas = Programa::all();
        $facultades = Facultad::all();
        $asignaturas = Asignatura::all();
        $usuarios = Usuario::all();
        $salones = Salon::all();
        return view('home', compact('rol', 'programas', 'facultades', 'asignaturas', 'usuarios', 'salones'));
    }
}
