@extends('layouts.dashboard')

@section('contenido')
<div class="title-contenido">
    <div class="back">
        <a class="btn btn-link" href="{{route('horarios.index')}}">
            <i class="fas fa-arrow-left"></i>
            Volver
        </a>
    </div>
    <h2>Editar</h2>
    <h1>Horario académico</h1>
</div>

<div class="main-contenido">
    @if (session('status'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('status') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    @if (session('error'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    <form method="POST" action="{{route('horarios.store')}}">
        @csrf
        <span style="display: block; margin-bottom: 1rem;">Todos los campos son obligatorios.</span>

        <div class="form-group group-inputs-3 first-auto">
            <div>
                <label for="periodo">{{__('Periodo')}}</label>
                <select name="periodo" id="periodo" class="form-control periodo" required>
                    <option value="">Seleccione el periodo</option>
                    @foreach($periodos as $periodo)
                    <option value="{{$periodo->id}}" {{ ($periodo->id == $horario->id_periodo) ? 'selected' : '' }}>
                        Periodo {{$periodo->año}}-0{{$periodo->periodo}}
                    </option>
                    @endforeach
                </select>
            </div>
            <div id="content-docente">
                <label for="docente">{{__('Docente')}}</label>
                <select name="docente" id="docente" class="form-control filter_docente docente">
                    <option value="">Seleccione el docente</option>
                    @foreach($docentes as $docente)
                    <option value="{{$docente->id}}" {{ ($docente->id == $horario->id_docente) ? 'selected' : '' }}>
                        {{$docente->nombres}}
                    </option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="asignatura">{{__('Asignatura')}}</label>
                <select name="asignatura" id="asignatura" class="form-control filter_asignatura" required>
                    <option value="">Seleccione la asignatura</option>
                    @foreach($asignaturas as $asignatura)
                    <option value="{{$asignatura->id}}" {{ ($asignatura->id == $horario->id_asignatura) ? 'selected' : '' }}>
                        {{$asignatura->nombre}}
                    </option>
                    @endforeach
                </select>
            </div>
        </div>
        <hr>
        <div id="panel-groups">
            @foreach($horario->grupos()->get() as $grupo_horario)
            <div class="form-group group-inputs-3 last-auto">
                <div>
                    <label>Grupos</label>
                    <select name="grupos[]" class="form-control filter_grupo" required>
                        <option value="">Seleccione un grupo</option>
                        @foreach($grupos as $grupo)
                        <option value="{{$grupo->id}}" {{ ($grupo->id == $grupo_horario->id) ? 'selected' : '' }}>
                            {{$grupo->nombre}} - {{$grupo->sede->nombre}} - {{$grupo->jornadaAcademica->nombre}} - {{$grupo->programa->nombre}}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label>Cantidad de estudiantes</label>
                    <input name="cantidad[]" class="form-control" type="number" placeholder="Ingrese la cantidad de estudiantes" value="{{$grupo_horario->grupos_horarios->cantidad_estudiantes}}" required>
                </div>
                <div class="item-end">
                    <button class="btn btn-danger remove" type="button"><i class="fas fa-minus-circle"></i></button>
                </div>
            </div>
            @endforeach
            <div class="form-group group-inputs-3 last-auto">
                <div>
                    <select name="grupos[]" class="form-control filter_grupo">
                        <option value="">Seleccione un grupo</option>
                        @foreach($grupos as $grupo)
                        <option value="{{$grupo->id}}">
                            {{$grupo->nombre}} - {{$grupo->sede->nombre}} - {{$grupo->jornadaAcademica->nombre}} - {{$grupo->programa->nombre}}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <input name="cantidad[]" class="form-control" type="number" placeholder="Ingrese la cantidad de estudiantes">
                </div>
                <div class="item-end">
                    <button class="btn btn-success" id="add_grupo" type="button" title="Añadir grupo"><i class="fas fa-plus-circle"></i></button>
                </div>
            </div>
        </div>
        <hr>
        <div id="panel-dias">
            @foreach($horario->horarioDia()->get() as $hdia)
            <div class="form-group group-inputs-5 last-auto">
                <div>
                    <label>Día</label>
                    <select id="dia" name="dias[]" class="form-control dia" required>
                        <option value="">Seleccione un día</option>
                        @foreach($dias as $dia)
                        <option value="{{$dia->id}}" {{ ($dia->id == $hdia->id_dia) ? 'selected' : '' }}>
                            {{$dia->nombre}}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label>Frecuencia</label>
                    <select name="frecuencias[]" class="form-control" required>
                        <option value="">Seleccione una frecuencia</option>
                        @foreach($frecuencias as $frecuencia)
                        <option value="{{$frecuencia->id}}" {{ ($frecuencia->id == $hdia->id_frecuencia) ? 'selected' : '' }}>
                            {{$frecuencia->nombre}}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label>Hora de inicio</label>
                    <input type="time" name="horas[]" class="form-control" placeholder="Ingrese la hora de inicio" min="07:00" max="21:30" value="{{$hdia->hora}}" required>
                </div>
                <div>
                    <label>Cantidad de horas</label>
                    <input name="cantidad_horas[]" step="any" class="form-control" type="number" placeholder="Ingrese la cantidad de horas" value="{{(round($hdia->cantidad_horas * pow(10, 1)) / pow(10, 1))}}" required>
                </div>
                <div class="item-end">
                    <button class="btn btn-danger remove" type="button"><i class="fas fa-minus-circle"></i></button>
                </div>
            </div>
            @endforeach
            <div class="form-group group-inputs-5 last-auto">
                <div>
                    <select id="dia" name="dias[]" class="form-control dia" required>
                        <option value="">Seleccione un día</option>
                        @foreach($dias as $dia)
                        <option value="{{$dia->id}}">
                            {{$dia->nombre}}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <select name="frecuencias[]" class="form-control" required>
                        <option value="">Seleccione una frecuencia</option>
                        @foreach($frecuencias as $frecuencia)
                        <option value="{{$frecuencia->id}}">
                            {{$frecuencia->nombre}}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <input type="time" name="horas[]" class="form-control" placeholder="Ingrese la hora de inicio" min="07:00" max="21:30" required>
                </div>
                <div>
                    <input name="cantidad_horas[]" step="any" class="form-control" type="number" placeholder="Ingrese la cantidad de horas" required>
                </div>
                <div class="item-end">
                    <button class="btn btn-success" id="add-dia" type="button" title="Añadir día"><i class="fas fa-plus-circle"></i></button>
                </div>
            </div>
        </div>
        <hr>
        <div class="form-group buttons">
            <button type="submit" class="btn btn-success">
                {{ __('Guardar cambios') }}
            </button>
        </div>
    </form>
</div>
@endsection

@section('scripts')
<script src="{{ asset('js/horario.js')}}"></script>
@endsection