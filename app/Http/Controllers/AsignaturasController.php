<?php

namespace App\Http\Controllers;

use App\Asignatura;
use Illuminate\Http\Request;

class AsignaturasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $asignaturas = Asignatura::paginate();
        return view('asignaturas.index', compact('asignaturas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
        Asignatura::create(
            $request->all()
        );
        return redirect()->route('asignaturas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Asignatura $asignaturas
     * @return \Illuminate\Http\Response
     */
    public function show(Asignatura $asignatura)
    { }

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
        $asignatura->codigo = $request->codigo;
        $asignatura->nombre = $request->nombre;
        $asignatura->creditos = $request->creditos;
        $asignatura->save();

        return redirect()->back();
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
