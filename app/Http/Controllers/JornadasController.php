<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jornada;

class JornadasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jornadas = Jornada::paginate();
        return view('jornadas.index', compact('jornadas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jornadas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Jornada::create($request->all());
        return redirect()->route('jornadas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        // Jornada::create($request->all());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Jornada $jornada)
    {
        return view('jornadas.edit', compact('jornada'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Jornada $jornada)
    {
        $jornada->hora_inicio = $request->hora_inicio;
        $jornada->hora_fin = $request->hora_fin;
        $jornada->save();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Jornada $jornada)
    {
        //
        $jornada->delete($request->id);
        return view('jornadas.index', compact('jornadas'));
    }
}
