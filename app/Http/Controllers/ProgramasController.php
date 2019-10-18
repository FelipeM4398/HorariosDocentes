<?php

namespace App\Http\Controllers;

use App\Facultad;
use App\Modalidad;
use App\Programa;
use App\TipoPrograma;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProgramasController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $modalidades = Modalidad::all();
        $tipoProgramas = TipoPrograma::all();
        $modalidad = $request->modalidad;
        $programas = Programa::nombre($request->nombre)
            ->modalidad($request->modalidad)
            ->tipo($request->tipo)
            ->orderBy('nombre')
            ->paginate(5);
        $request->flash();
        return view('programas.index', compact('programas', 'modalidades', 'tipoProgramas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Auth::user()->authorizeRoles('Administrador');
        $directores = User::whereIdTipoUsuario(3)->get();
        $modalidades = Modalidad::all();
        $facultades = Facultad::all();
        $tipoProgramas = TipoPrograma::all();
        return view('programas.create', compact('directores', 'modalidades', 'facultades', 'tipoProgramas'));
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
        Programa::create($request->all());
        return redirect()->back()->with('status', 'Se ha registrado un nuevo programa exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Programa $programa)
    {
        Auth::user()->authorizeRoles('Administrador');
        $directores = User::whereIdTipoUsuario(3)->get();
        $modalidades = Modalidad::all();
        $facultades = Facultad::all();
        $tipoProgramas = TipoPrograma::all();

        return view('programas.edit', compact('programa', 'directores', 'modalidades', 'facultades', 'tipoProgramas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Programa $programa)
    {
        Auth::user()->authorizeRoles('Administrador');
        $programa->fill($request->all());
        $programa->save();
        return redirect()->back()->with('status', 'Se han guardado los cambios exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
