<?php

namespace App\Http\Controllers;

use App\Grupo;
use App\JornadaAcademica;
use App\Programa;
use App\Sede;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GruposController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $programas = Programa::all();
        $jornadas = JornadaAcademica::all();
        $sedes = Sede::all();
        $grupos = Grupo::nombre($request->nombre)
            ->programa($request->programa)
            ->jornada($request->jornada)
            ->sede($request->sede)
            ->paginate(10);
        $request->flash();
        return view('grupos.index', compact('grupos', 'programas', 'jornadas', 'sedes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user()) {
            # code...
            Auth::user()->authorizeRoles(['Administrador', 'Director']);
            $programas = Programa::all();
            $jornadas = JornadaAcademica::all();
            $sedes = Sede::all();
            return view('grupos.create', compact('programas', 'jornadas', 'sedes'));
        }
        abort('401');
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Auth::user()) {
            # code...
            if (
                Grupo::nombre($request->nombre)
                ->programa($request->id_programa)
                ->jornada($request->id_jornada_academica)
                ->sede($request->id_sede)
                ->count() != 0
            ) {
                return redirect()->back()->with('error', 'Ye existe un grupo con esta información');
            }
            Grupo::create(
                $request->all()
            );
            return redirect()->back()->with('status', 'Se ha registrado un nuevo grupo exitosamente');
        }
        abort('401');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\grupo $grupos
     * @return \Illuminate\Http\Response
     */
    public function show(grupo $grupo)
    { }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\grupo $grupos
     * @return \Illuminate\Http\Response
     */
    public function edit(Grupo $grupo)
    {
        $programas = Programa::all();
        $jornadas = JornadaAcademica::all();
        $sedes = Sede::all();
        return view('grupos.edit', compact('grupo', 'programas', 'jornadas', 'sedes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\grupo $grupos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Grupo $grupo)
    {
        if (Auth::user()) {
            # code...
            Auth::user()->authorizeRoles(['Administrador', 'Director']);
            $grupo->nombre = $request->nombre;
            $grupo->id_programa = $request->id_programa;
            $grupo->id_jornada_academica = $request->id_jornada_academica;
            $grupo->id_sede = $request->id_sede;

            $grupo->save();

            return redirect()->back()->with('status', 'Se han guardado los cambios exitosamente');
        }
        abort('401');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param grupo $grupo
     * @return void
     */
    public function destroy(grupo $grupo)
    {
        //
    }
}
