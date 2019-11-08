<?php

namespace App\Http\Controllers;

use App\Asignatura;
use App\Dia;
use App\DisponibilidadDia;
use App\DisponibilidadDocente;
use App\Exports\HorarioExport;
use App\FrecuenciaHoraria;
use App\Grupo;
use App\HorarioDetalle;
use App\PeriodoAcademico;
use App\Usuario;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class HorariosController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    { }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $periodo = $request->periodo_id;
        $salon = $request->salon;
        $periodos = PeriodoAcademico::orderBy('año', 'DESC')->orderBy('periodo')->get();
        $horarios = HorarioDetalle::periodoo($periodo)
            ->docentee(Request('docente'))
            ->asignaturaa(Request('asignatura'))
            ->whereHas('horarioDia', function ($horario) {
                $horario->diaa(Request('dia'));
            })
            ->whereHas('grupos', function ($grupos) {
                $grupos->idd(Request('grupo'));
            })
            ->paginate(10);
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
        if (Auth::user()) {
            # code...
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
        abort('401');
    }

    public function show(HorarioDetalle $horario)
    {
        $esCompartida = false;
        if (Auth::user()) {
            # code...
            $user = Auth::user();
            if ($user->hasAnyRole('Director')) {
                foreach ($horario->grupos as $grupo) {
                    foreach ($user->programa as $programa) {
                        # code...
                        if ($grupo->id_programa != $programa->id) {
                            $esCompartida = true;
                        }
                    }
                }
            }
        }
        $estudiantes = $horario->grupos()->sum('cantidad_estudiantes');
        $factor = pow(10, 1);
        $cant_semanales = 0;
        $cant_quincenales = 0;

        foreach ($horario->horarioDia()->get() as $horarioDia) {
            if ($horarioDia->id_frecuencia == 1) {
                $cant_semanales += $horarioDia->cantidad_horas;
            } else {
                $cant_quincenales += $horarioDia->cantidad_horas;
            }
        }

        $cant_horas = $cant_semanales + ($cant_quincenales / 2);

        $horas = (round($cant_horas * $factor) / $factor);
        return view('horarios.show', compact('horario', 'estudiantes', 'horas', 'esCompartida'));
    }

    public function store()
    {
        if (Auth::user()) {
            Auth::user()->authorizeRoles(['Administrador', 'Director']);
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
        abort('401');
    }

    public function edit(Request $request, HorarioDetalle $horario)
    {
        if (Auth::user()) {
            Auth::user()->authorizeRoles(['Administrador', 'Director']);
            $user = Auth::user();
            if ($user->hasAnyRole('Director')) {
                foreach ($horario->grupos as $grupo) {
                    foreach ($user->programa as $programa) {
                        # code...
                        if ($grupo->id_programa != $programa->id) {
                            abort('401');
                        }
                    }
                }
            }
            $periodos = PeriodoAcademico::where('año', '>=', Carbon::now()->year)
                ->orderBy('año', 'DESC')
                ->orderBy('periodo')
                ->get();
            $docentes = $horario->asignatura->docentes;
            $asignaturas = $horario->docente->asignaturas;
            $grupos = Grupo::all();
            $dias = Dia::all();
            $frecuencias = FrecuenciaHoraria::all();
            return view('horarios.edit', compact('periodos', 'docentes', 'asignaturas', 'grupos', 'dias', 'frecuencias', 'horario'));
        }
        abort('401');
    }

    public function update(HorarioDetalle $horario)
    {
        if (Auth::user()) {
            Auth::user()->authorizeRoles(['Administrador', 'Director']);
            $horario->id_docente = Request('docente');
            $horario->id_asignatura = Request('asignatura');
            $horario->id_periodo = Request('periodo');
            $dias = Request('dias');
            $frecuencias = Request('frecuencias');
            $horas = Request('horas');
            $cantidad_horas = Request('cantidad_horas');
            $grupo_horario = [];
            $horario_dia = [];

            $grupos = Request('grupos');
            $cantidad = Request('cantidad');
            for ($i = 0; $i < count(Request('grupos')); $i++) {
                if ($grupos[$i]) {
                    $grupo_horario[$i] = ['id_grupo' => $grupos[$i], 'cantidad_estudiantes' => $cantidad[$i]];
                }
            }

            for ($i = 0; $i < count($dias); $i++) {
                if ($dias[$i]) {
                    $horario_dia[$i] = [
                        'id_dia' => $dias[$i],
                        'hora' => $horas[$i],
                        'cantidad_horas' => $cantidad_horas[$i],
                        'id_frecuencia' => $frecuencias[$i]
                    ];
                }
            }
            $horario->grupos()->detach();
            $horario->grupos()->attach($grupo_horario);

            $horario->horarioDia()->delete();
            $horario->horarioDia()->createMany($horario_dia);

            $horario->save();
            return redirect()->back()->with('status', 'Se han guardado los cambios exitosamente');
        }
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

    public function export()
    {
        return Excel::download(new HorarioExport, 'ReporteHorario.xlsx');
    }
}
