<?php

namespace App\Http\Controllers;

use App\Asignatura;
use App\HorarioDetalle;
use App\PeriodoAcademico;
use App\Usuario;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

class HorariosController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        Auth::user()->authorizeRoles(['Director', 'Administrador']);
        $periodos = PeriodoAcademico::orderBy('año', 'DESC')->orderBy('periodo')->get();
        $horarios = HorarioDetalle::all();
        return view('horarios.horarios', compact('periodos', 'horarios'));
    }

    /**
     * Show the create view.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function create()
    {
        Auth::user()->authorizeRoles(['Director', 'Administrador']);
        if (Carbon::now()->month >= 6) {
            $currentPeriodo = 2;
        } else {
            $currentPeriodo = 1;
        };
        $periodos = PeriodoAcademico::where('año', '>=', Carbon::now()->year)
            ->periodo($currentPeriodo)
            ->orderBy('año', 'DESC')
            ->orderBy('periodo')
            ->get();
        $docentes = Usuario::rol('4')->get();
        $asignaturas = Asignatura::all();
        return view('horarios.registerHorario', compact('periodos', 'docentes', 'asignaturas'));
    }
}
