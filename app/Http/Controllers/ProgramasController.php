<?php

namespace App\Http\Controllers;

use App\Facultad;
use App\Modalidad;
use App\Programa;
use App\TipoPrograma;
use App\User;
use Illuminate\Http\Request;

class ProgramasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $programas = Programa::paginate();

        return view('programas.index', compact('programas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
        Programa::create($request->all());
        return redirect()->back();
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
        $programa->fill($request->all());
        $programa->save();
        return redirect()->back();
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
