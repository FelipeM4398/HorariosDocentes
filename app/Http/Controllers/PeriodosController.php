<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PeriodoAcademico;

class PeriodosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $año = $request->año;
        $periodo = $request->periodo;
        $request->flash();
        $periodos = PeriodoAcademico::orderBy('año', 'DESC')
            ->año($año)
            ->periodo($periodo)->paginate(10);
        return view('periodos.index', compact('periodos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('periodos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $año = $request->año;
        $periodo = $request->periodo;
        if (PeriodoAcademico::periodo($periodo)->año($año)->count() != 0) {
            return redirect()->back()->with('error', 'Ya existe un registro con el mismo año y periodo');
        }
        PeriodoAcademico::create($request->all());
        return redirect()->route('periodos.index')->with('status', 'Se ha registrado un nuevo periodo exitosamente');
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
        // Periodo::create($request->all());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(PeriodoAcademico $periodo)
    {
        return view('periodos.edit', compact('periodo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PeriodoAcademico $periodo)
    {
        $periodo->año = $request->año;
        $periodo->periodo = $request->periodo;
        if (PeriodoAcademico::periodo($periodo->periodo)->año($periodo->año)->count() != 0) {
            return redirect()->back()->with('error', 'Ya existe un registro con el mismo año y periodo');
        }
        $periodo->save();
        return redirect()->back()->with('status', 'Se han guardado los cambios exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, PeriodoAcademico $periodo)
    {
        //
        $periodo->delete($request->id);
        return view('periodos.index', compact('periodos'));
    }
}
