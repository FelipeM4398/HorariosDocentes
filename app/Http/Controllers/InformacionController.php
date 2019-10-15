<?php

namespace App\Http\Controllers;

use App\TipoContrato;
use App\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InformacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $informacion = Auth::user();
        $contratos = TipoContrato::all()->where('id', '!=', $informacion->id_tipo_contrato);
        return view('usuarios.informacion', compact('informacion', 'contratos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Usuario $usuario
     * @return \Illuminate\Http\Response
     */
    public function show(Usuario $usuario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Usuario $informacion
     * @return \Illuminate\Http\Response
     */
    public function edit(Usuario $informacion)
    {
        $user = $informacion;
        $contratos = TipoContrato::all();
        return view('usuarios.informacion', compact('user', 'contratos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Usuario $informacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Usuario $informacion)
    {
        Auth::user()->nombres = $request->nombres;
        Auth::user()->apellidos = $request->apellidos;
        Auth::user()->identificacion = $request->identificacion;
        Auth::user()->telefono = $request->telefono;
        Auth::user()->email = $request->email;
        Auth::user()->id_tipo_contrato = $request->contrato;
        Auth::user()->save();
        return redirect()->back()->with('status', 'Se han guardado los cambios exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Usuario $usuario
     * @return void
     */
    public function destroy(Asignatura $asignatura)
    {
        //
    }
}
