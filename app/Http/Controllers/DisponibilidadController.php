<?php

namespace App\Http\Controllers;

use App\DisponibilidadDocente;
use App\Jornada;
use App\PeriodoAcademico;
use App\Usuario;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DisponibilidadController extends Controller
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
     * @param Usuario $usuario
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        Auth::user()->authorizeRoles(['Docente']);
        $año = $request->año;
        $periodo = $request->periodo;
        $request->flash();
        $periodos = Auth::user()
            ->periodo()
            ->orderBy('año', 'DESC')
            ->año($año)
            ->periodo($periodo)
            ->paginate(12);
        return view('usuarios.disponibilidad', compact('periodos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Auth::user()->authorizeRoles(['Docente']);
        $periodos = PeriodoAcademico::where('año', '>=', Carbon::now()->year)
            ->get();
        $jornadas = Jornada::all();
        return view('usuarios.createDisponibilidad', compact('periodos', 'jornadas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Auth::user()->authorizeRoles(['Docente']);

        $usuario = Auth::user();
        $periodo = $request->periodo;

        if ($usuario->periodo()->where('id_periodo', '=', $periodo)->count() != 0) {
            return redirect()->back()->with('error', 'Ya se encuentra registrada una disponibilidad para este periodo.');
        } else {
            $usuario->periodo()->attach(PeriodoAcademico::where('id', '=', $periodo)->get());
            $usuario->save();
            $usuario->periodo()->where('id_periodo', '=', $periodo)->first()->pivot->dispoDias()->createMany([
                ['id_jornada' => 1, 'id_dia' => 1, 'disponible' => $request->check_11 ? 1 : 0],
                ['id_jornada' => 1, 'id_dia' => 2, 'disponible' => $request->check_12 ? 1 : 0],
                ['id_jornada' => 1, 'id_dia' => 3, 'disponible' => $request->check_13 ? 1 : 0],
                ['id_jornada' => 1, 'id_dia' => 4, 'disponible' => $request->check_14 ? 1 : 0],
                ['id_jornada' => 1, 'id_dia' => 5, 'disponible' => $request->check_15 ? 1 : 0],
                ['id_jornada' => 1, 'id_dia' => 6, 'disponible' => $request->check_16 ? 1 : 0],
                ['id_jornada' => 2, 'id_dia' => 1, 'disponible' => $request->check_21 ? 1 : 0],
                ['id_jornada' => 2, 'id_dia' => 2, 'disponible' => $request->check_22 ? 1 : 0],
                ['id_jornada' => 2, 'id_dia' => 3, 'disponible' => $request->check_23 ? 1 : 0],
                ['id_jornada' => 2, 'id_dia' => 4, 'disponible' => $request->check_24 ? 1 : 0],
                ['id_jornada' => 2, 'id_dia' => 5, 'disponible' => $request->check_25 ? 1 : 0],
                ['id_jornada' => 2, 'id_dia' => 6, 'disponible' => $request->check_26 ? 1 : 0],
                ['id_jornada' => 3, 'id_dia' => 1, 'disponible' => $request->check_31 ? 1 : 0],
                ['id_jornada' => 3, 'id_dia' => 2, 'disponible' => $request->check_32 ? 1 : 0],
                ['id_jornada' => 3, 'id_dia' => 3, 'disponible' => $request->check_33 ? 1 : 0],
                ['id_jornada' => 3, 'id_dia' => 4, 'disponible' => $request->check_34 ? 1 : 0],
                ['id_jornada' => 3, 'id_dia' => 5, 'disponible' => $request->check_35 ? 1 : 0],
                ['id_jornada' => 3, 'id_dia' => 6, 'disponible' => $request->check_36 ? 1 : 0],
                ['id_jornada' => 4, 'id_dia' => 1, 'disponible' => $request->check_41 ? 1 : 0],
                ['id_jornada' => 4, 'id_dia' => 2, 'disponible' => $request->check_42 ? 1 : 0],
                ['id_jornada' => 4, 'id_dia' => 3, 'disponible' => $request->check_43 ? 1 : 0],
                ['id_jornada' => 4, 'id_dia' => 4, 'disponible' => $request->check_44 ? 1 : 0],
                ['id_jornada' => 4, 'id_dia' => 5, 'disponible' => $request->check_45 ? 1 : 0],
                ['id_jornada' => 4, 'id_dia' => 6, 'disponible' => $request->check_46 ? 1 : 0],
                ['id_jornada' => 5, 'id_dia' => 1, 'disponible' => $request->check_51 ? 1 : 0],
                ['id_jornada' => 5, 'id_dia' => 2, 'disponible' => $request->check_52 ? 1 : 0],
                ['id_jornada' => 5, 'id_dia' => 3, 'disponible' => $request->check_53 ? 1 : 0],
                ['id_jornada' => 5, 'id_dia' => 4, 'disponible' => $request->check_54 ? 1 : 0],
                ['id_jornada' => 5, 'id_dia' => 5, 'disponible' => $request->check_55 ? 1 : 0],
                ['id_jornada' => 5, 'id_dia' => 6, 'disponible' => $request->check_56 ? 1 : 0],
            ]);
            $usuario->save();
            return redirect('disponibilidad')->with('status', 'Se ha registrado su disponibilidad exitosamente.');
        }
    }

    /**
     * Show the application dashboard.
     * @param Usuario $usuario
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function periodo(Request $request, Usuario $usuario)
    {
        Auth::user()->authorizeRoles(['Administrador']);
        $año = $request->año;
        $periodo = $request->periodo;
        $request->flash();
        $periodos = $usuario
            ->periodo()
            ->orderBy('año', 'DESC')
            ->año($año)
            ->periodo($periodo)
            ->paginate(12);
        return view('usuarios.disponibilidad', compact('periodos', 'usuario'));
    }

    /**
     * Show the application dashboard.
     * @param Usuario $usuario
     * @param PeriodoAcademico $periodo
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function dispo(Request $request, Usuario $usuario, PeriodoAcademico $periodo)
    {
        Auth::user()->authorizeRoles(['Administrador', 'Docente']);
        $dispo = DisponibilidadDocente::docentee($usuario->id)
            ->periodoo($periodo->id)
            ->first();

        $disponibilidades = $usuario->disponibilidades()
            ->where('id_dispo', $dispo->id)
            ->orderBy('id_jornada', 'ASC')
            ->orderBy('id_dia', 'ASC')
            ->get()
            ->groupBy('id_jornada');
        return view('usuarios.showDisponibilidad', compact('disponibilidades', 'usuario', 'periodo'));
    }
}
