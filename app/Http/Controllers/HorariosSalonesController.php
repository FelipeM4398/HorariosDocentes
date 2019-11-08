<?php

namespace App\Http\Controllers;

use App\Dia;
use App\HorarioDia;
use App\PeriodoAcademico;
use App\Salon;
use Illuminate\Support\Facades\Auth;

class HorariosSalonesController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::user()) {
            Auth::user()->authorizeRoles(['Coordinacion']);
            $periodos = PeriodoAcademico::orderBy('año', 'DESC')->orderBy('periodo')->get();
            $dias = Dia::all();
            $horarios = HorarioDia::diaa(Request('dia'))
                ->hora(Request('hora'))
                ->asignar(Request('asignar'))
                ->whereHas('horarioDetalle', function ($horario) {
                    $horario->periodoo(Request('periodo'));
                })
                ->paginate(25);
            Request()->flash();
            return view('horarios/salones.index', compact('periodos', 'horarios', 'dias'));
        }
        abort('401');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\HorarioDia $horario
     * @return \Illuminate\Http\Response
     */
    public function edit(HorarioDia $horario)
    {
        $cantidad = $horario->horarioDetalle->grupos->sum('grupos_horarios.cantidad_estudiantes');
        $salones = Salon::where('capacidad', '>=', $cantidad)->get();
        return view('horarios/salones.edit', compact('horario', 'salones'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\HorarioDia $horario
     * @return \Illuminate\Http\Response
     */
    public function update(HorarioDia $horario)
    {
        $id_salon = Request('salon');
        $horario->salon()->associate($id_salon);
        $horario->save();
        return \redirect()->back()->with('status', 'Se han guardado los cambios exitosamente');
    }
}
