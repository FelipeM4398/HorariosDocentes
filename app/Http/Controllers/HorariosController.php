<?php

namespace App\Http\Controllers;

use App\Asignatura;
use App\Dia;
use App\DisponibilidadDia;
use App\DisponibilidadDocente;
use App\FrecuenciaHoraria;
use App\Grupo;
use App\HorarioDetalle;
use App\PeriodoAcademico;
use App\Usuario;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

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
        $periodo = $request->periodo_id;
        $periodos = PeriodoAcademico::orderBy('año', 'DESC')->orderBy('periodo')->get();
        $horarios = HorarioDetalle::with(['grupos', 'horarioDia'])->periodoo($periodo)->paginate(10);
        $request->flash();
        return view('horarios.index', compact('periodos', 'horarios'));
    }

    /**
     * Show the create view.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function create()
    {
        Auth::user()->authorizeRoles(['Director', 'Administrador']);

        $periodos = PeriodoAcademico::where('año', '>=', Carbon::now()->year)
            ->orderBy('año', 'DESC')
            ->orderBy('periodo')
            ->get();
        $docentes = Usuario::rol('4')->get();
        $asignaturas = Asignatura::all();
        $grupos = Grupo::all();
        $dias = Dia::all();
        $frecuencias = FrecuenciaHoraria::all();
        return view('horarios.create', compact('periodos', 'docentes', 'asignaturas', 'grupos', 'dias', 'frecuencias'));
    }

    public function show(HorarioDetalle $horario)
    {
        $estudiantes = $horario->grupos()->sum('cantidad_estudiantes');
        $factor = pow(10, 1);
        $cant_horas = $horario->horarioDia()->sum('cantidad_horas');
        $horas = (round($cant_horas * $factor) / $factor);
        return view('horarios.show', compact('horario', 'estudiantes', 'horas'));
    }

    public function store()
    {
        $docente = Request('docente');
        $asignatura = Request('asignatura');
        $periodo = Request('periodo');
        $grupos = Request('grupos');
        $cantidad = Request('cantidad');
        $dias = Request('dias');
        $frecuencias = Request('frecuencias');
        $horas = Request('horas');
        $cantidad_horas = Request('cantidad_horas');

        $grupo_horario = [];
        $horario_dia = [];

        if (HorarioDetalle::where('id_asignatura', $asignatura)->where('id_docente', $docente)->where('id_periodo', $periodo)->count() != 0) {
            return redirect()->back()->with('error', 'Ya se encuentra registrado un horario con esta información');
        }

        $horario = new HorarioDetalle;
        $horario->docente()->associate($docente);
        $horario->asignatura()->associate($asignatura);
        $horario->periodo()->associate($periodo);

        $horario->save();

        for ($i = 0; $i < count($grupos); $i++) {
            $grupo_horario[$i] = ['id_grupo' => $grupos[$i], 'cantidad_estudiantes' => $cantidad[$i]];
        }

        for ($i = 0; $i < count($dias); $i++) {
            $horario_dia[$i] = ['id_dia' => $dias[$i], 'hora' => $horas[$i], 'cantidad_horas' => $cantidad_horas[$i], 'id_frecuencia' => $frecuencias[$i]];
        }

        $horario->grupos()->attach($grupo_horario);
        $horario->horarioDia()->createMany($horario_dia);

        return redirect()->back()->with('status', 'Se ha registrado el horario exitosamente');
    }

    public function listGrupos()
    {
        $grupos = Grupo::with(['sede', 'jornadaAcademica', 'programa'])->get();
        return $grupos;
    }

    public function listDias()
    {
        $dias = Dia::all();
        $frecuencias = FrecuenciaHoraria::all();
        return ['dias' => $dias, 'frecuencias' => $frecuencias];
    }

    public function dispo(int $periodo, int $docente, int $dia)
    {
        $dispo = DisponibilidadDocente::docentee($docente)
            ->periodoo($periodo)
            ->first();

        $disponibilidades = DisponibilidadDia::with('jornada')->where('id_dispo', $dispo->id)
            ->where('id_dia', $dia)
            ->where('disponible', true)
            ->orderBy('id_jornada')
            ->get();
        return $disponibilidades;
    }

    public function listDocentes(int $periodo)
    {
        $periodos = PeriodoAcademico::where('id', $periodo)->first();
        $docentes = $periodos->docentes()->get(['id_docente', 'identificacion', 'nombres', 'apellidos']);
        return $docentes;
    }
    public function listAsignaturas(int $docente)
    {
        $doc = Usuario::where('id', $docente)->first();
        $asignaturas = $doc->asignaturas()->get(['id_asignatura', 'nombre', 'codigo']);
        return $asignaturas;
    }
}
