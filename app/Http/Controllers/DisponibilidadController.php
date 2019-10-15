<?php

namespace App\Http\Controllers;

use App\DisponibilidadDocente;
use App\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DisponibilidadController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     * @param Usuario $usuario
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        Auth::user()->authorizeRoles(['Docente']);
        $año = $request->año;
        $periodo = $request->periodo;
        $request->flash();
        $periodos = Auth::user()
            ->periodo()
            ->orderBy('año', 'DESC')
            ->año($año)
            ->periodo($periodo)
            ->paginate(12);
        return view('usuarios.disponibilidad', compact('periodos'));
    }

    /**
     * Display the specified resource.
     *
     * @param \App\ $usuario
     * @return \Illuminate\Http\Response
     */
    public function show(Usuario $usuario)
    {
        Auth::user()->authorizeRoles('Administrador');
        return view('usuarios.usuario', compact('usuario'));
    }

    /**
     * Show the application dashboard.
     * @param Usuario $usuario
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function dispo(Request $request, Usuario $usuario)
    {
        Auth::user()->authorizeRoles(['Administrador']);
        $año = $request->año;
        $periodo = $request->periodo;
        $request->flash();
        $periodos = $usuario
            ->periodo()
            ->orderBy('año', 'DESC')
            ->año($año)
            ->periodo($periodo)
            ->paginate(12);
        return view('usuarios.disponibilidad', compact('periodos', 'usuario'));
    }
}
