<?php

namespace App\Http\Controllers;

use App\TipoUsuario;
use App\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsuariosController extends Controller
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
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        Auth::user()->authorizeRoles('Administrador');
        $identificacion = $request->identificacion;
        $nombre = $request->nombre;
        $apellido = $request->apellido;
        $rol = $request->rol;

        $usuarios = Usuario::where('id', '!=', Auth::user()->id_tipo_usuario)
            ->identificacion($identificacion)
            ->nombre($nombre)
            ->apellido($apellido)
            ->rol($rol)
            ->paginate(6);

        $request->flash();
        return view('usuarios.usuarios', compact('usuarios'));
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Usuario $usuario
     * @return \Illuminate\Http\Response
     */
    public function show(Usuario $usuario)
    {
        Auth::user()->authorizeRoles('Administrador');
        return view('usuarios.usuario', compact('usuario'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Usuario $usuario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Usuario $usuario)
    {
        Auth::user()->authorizeRoles('Administrador');
        $usuario->id_tipo_usuario = $request->rol;
        $usuario->save();
        return redirect()->back()->with('status', 'Se han guardado los cambios exitosamente');
    }
}
