<?php

namespace App\Http\Controllers;

use App\Asignatura;
use App\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AsignaturasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $asignaturas = Asignatura::codigo($request->codigo)
            ->nombre($request->nombre)
            ->orderBy('nombre')
            ->paginate(5);
        $request->flash();
        return view('asignaturas.index', compact('asignaturas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Auth::user()->authorizeRoles('Administrador');
        return view('asignaturas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Auth::user()->authorizeRoles('Administrador');
        Asignatura::create(
            $request->all()
        );
        return redirect()->route('asignaturas.index')->with('status', 'Se ha registrado una nueva asignatura exitosamente.');;
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Usuario $usuario
     * @return \Illuminate\Http\Response
     */
    public function showAsignaturasDocente(Usuario $usuario)
    {
        Auth::user()->authorizeRoles(['Docente']);
        $asignaturas = $usuario->asignaturas()->orderBy('nombre')->paginate(7);
        return view('usuarios.asignaturas', compact('asignaturas'));
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Asignatura $asignatura
     * @return \Illuminate\Http\Response
     */
    public function asociarAsignatura(Asignatura $asignatura)
    {
        Auth::user()->authorizeRoles(['Docente']);
        Auth::user()->asignaturas()->attach($asignatura);
        Auth::user()->save();
        return redirect()->route('usuarios.selectAsignaturas')->with('status', 'Se ha añadido una asignatura.');
    }

    public function eliminarAsignatura(Asignatura $asignatura)
    {
        Auth::user()->authorizeRoles(['Docente']);
        Auth::user()->asignaturas()->detach($asignatura);
        Auth::user()->save();
        return redirect()->back()->with('status', 'Se ha eliminado una asignatura de tu lista.');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Request $request
     * @return \Illuminate\Http\Response
     */
    public function seleccionarAsignaturas(Request $request)
    {
        Auth::user()->authorizeRoles(['Docente']);
        $ids = [];
        foreach (Auth::user()->asignaturas()->get() as $asignatura) {
            array_push($ids, $asignatura->id);
        }
        $asignaturas = Asignatura::codigo($request->codigo)
            ->nombre($request->nombre)
            ->whereNotIn('id', $ids)
            ->orderBy('nombre')
            ->paginate(10);
        $request->flash();
        return view('usuarios.seleccionarAsignaturas', compact('asignaturas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Asignatura $asignaturas
     * @return \Illuminate\Http\Response
     */
    public function edit(Asignatura $asignatura)
    {
        Auth::user()->authorizeRoles('Administrador');
        return view('asignaturas.edit', compact('asignatura'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Asignatura $asignaturas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Asignatura $asignatura)
    {
        Auth::user()->authorizeRoles('Administrador');
        $asignatura->codigo = $request->codigo;
        $asignatura->nombre = $request->nombre;
        $asignatura->creditos = $request->creditos;
        $asignatura->save();

        return redirect()->back()->with('status', 'Se han guardado los cambios exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Asignatura $asignatura
     * @return void
     */
    public function destroy(Asignatura $asignatura)
    {
        //
    }
}
