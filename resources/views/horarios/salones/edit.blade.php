@extends('layouts.dashboard')

@section('contenido')
<div class="title-contenido">
    <div class="back">
        <a class="btn btn-link" href="{{route('horarios_salones.index')}}">
            <i class="fas fa-arrow-left"></i>
            Volver
        </a>
    </div>
    <h2>Asignar</h2>
    <h1>Salón</h1>
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

    <div class="container-jbetween">
        <div>
            <span style="display: inline-block; margin-right: 0.7em;">
                <b>Periodo: </b>
                {{$horario->horarioDetalle->periodo->año}} - {{$horario->horarioDetalle->periodo->periodo}}
            </span>
            <span style="display: inline-block; margin-right: 0.7em;">
                <b>Total estudiantes: </b>
                {{$horario->horarioDetalle->grupos->sum('grupos_horarios.cantidad_estudiantes')}}
            </span>
        </div>
    </div>

    <form method="POST" action="{{route('horarios_salones.update', $horario)}}">
        @method('PUT')
        @csrf
        <div>
            <b>Información asignatura</b>
            <div class="group-inputs-2">
                <div>
                    <label>Código</label>
                    <input class="form-control" value="{{$horario->horarioDetalle->asignatura->codigo}}" readonly>
                </div>
                <div>
                    <label>Nombre</label>
                    <input class="form-control" value="{{$horario->horarioDetalle->asignatura->nombre}}" readonly>
                </div>
            </div>
        </div>
        <hr>

        <div>
            <b>Información docente</b>
            <div class="group-inputs-3">
                <div>
                    <label>Identificación</label>
                    <input class="form-control" value="{{$horario->horarioDetalle->docente->identificacion}}" readonly>
                </div>
                <div>
                    <label>Nombres</label>
                    <input class="form-control" value="{{$horario->horarioDetalle->docente->nombres}}" readonly>
                </div>
                <div>
                    <label>Apellidos</label>
                    <input class="form-control" value="{{$horario->horarioDetalle->docente->apellidos}}" readonly>
                </div>
            </div>
        </div>

        <hr>

        <div>
            <b>Información horario del día {{$horario->dia->nombre}}</b>
            <div class="form-group">
                <label>Salón</label>
                <select name="salon" id="salon" class="form-control filter_salon">
                    <option value="">Seleccione el salón</option>
                    @foreach($salones as $salon)
                    <option value="{{$salon->id}}" {{($salon->id == $horario->id_salon) ? 'selected' : ''}}>
                        {{$salon->sede->nombre}}
                        @if ($salon->subsede)
                        - {{$salon->subsede->nombre}}
                        @endif
                        - {{$salon->nombre}}
                        - {{$salon->capacidad}} estudiantes
                        - {{$salon->tipoSalon->nombre}}
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group group-inputs-3">
                <div>
                    <label>Frecuencia</label>
                    <input class="form-control" value="{{$horario->frecuencia->nombre}}" readonly>
                </div>
                <div>
                    <label>Hora inicio</label>
                    <input class="form-control" type="text" value="{{$horario->horaInicio()}}" readonly>
                </div>
                <div>
                    <label>Hora fin</label>
                    <input class="form-control" type="text" value="{{$horario->horaFin()}}" readonly>
                </div>
            </div>
        </div>

        <hr>

        <div>
            <b>Información grupos</b>
            @foreach($horario->horarioDetalle->grupos as $grupo)
            <div class="group-inputs-5">
                <div class="form-group">
                    <label>Grupo</label>
                    <input class="form-control" value="{{$grupo->nombre}}" readonly>
                </div>
                <div class="form-group">
                    <label>Programa</label>
                    <input class="form-control" value="{{$grupo->programa->nombre}}" readonly>
                </div>
                <div class="form-group">
                    <label>Jornada</label>
                    <input class="form-control" value="{{$grupo->jornadaAcademica->nombre}}" readonly>
                </div>
                <div class="form-group">
                    <label>Sede</label>
                    <input class="form-control" value="{{$grupo->sede->nombre}}" readonly>
                </div>
                <div class="form-group">
                    <label>Estudiantes</label>
                    <input class="form-control" value="{{$grupo->grupos_horarios->cantidad_estudiantes}}" readonly>
                </div>
            </div>
            @endforeach
        </div>

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