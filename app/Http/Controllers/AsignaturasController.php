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
        if (Auth::user()) {
            # code...
            Auth::user()->authorizeRoles(['Administrador', 'Director']);
            return view('asignaturas.create');
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
            Auth::user()->authorizeRoles(['Administrador', 'Director']);
            Asignatura::create(
                $request->all()
            );
            return redirect()
                ->route('asignaturas.index')
                ->with(
                    'status',
                    'Se ha registrado una nueva asignatura exitosamente.'
                );;
        }
        abort(401);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Usuario $usuario
     * @return \Illuminate\Http\Response
     */
    public function showAsignaturasDocente(Usuario $usuario)
    {
        if (Auth::user()) {
            # code...
            Auth::user()->authorizeRoles(['Docente']);
            $asignaturas = $usuario->asignaturas()->orderBy('nombre')->paginate(7);
            return view('usuarios.asignaturas', compact('asignaturas'));
        }
        abort('401');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Asignatura $asignatura
     * @return \Illuminate\Http\Response
     */
    public function asociarAsignatura(Asignatura $asignatura)
    {
        if (Auth::user()) {
            # code...
            Auth::user()->authorizeRoles(['Docente']);
            Auth::user()->asignaturas()->attach($asignatura);
            Auth::user()->save();
            return redirect()->route('usuarios.selectAsignaturas')->with('status', 'Se ha añadido una asignatura.');
        }
        abort('401');
    }

    public function eliminarAsignatura(Asignatura $asignatura)
    {
        if (Auth::user()) {
            # code...
            Auth::user()->authorizeRoles(['Docente']);
            Auth::user()->asignaturas()->detach($asignatura);
            Auth::user()->save();
            return redirect()->back()->with('status', 'Se ha eliminado una asignatura de tu lista.');
        }
        abort('401');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Request $request
     * @return \Illuminate\Http\Response
     */
    public function seleccionarAsignaturas(Request $request)
    {
        if (Auth::user()) {
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
        abort('401');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Asignatura $asignaturas
     * @return \Illuminate\Http\Response
     */
    public function edit(Asignatura $asignatura)
    {
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
        if (Auth::user()) {
            Auth::user()->authorizeRoles(['Administrador', 'Director']);
            $asignatura->codigo = $request->codigo;
            $asignatura->nombre = $request->nombre;
            $asignatura->creditos = $request->creditos;
            $asignatura->save();

            return redirect()->back()->with('status', 'Se han guardado los cambios exitosamente');
        }
        abort('401');
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
