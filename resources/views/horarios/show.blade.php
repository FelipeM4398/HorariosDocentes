@extends('layouts.dashboard')

@section('contenido')
<div class="title-contenido">
    <div class="back">
        <a class="btn btn-link" href="{{route('horarios.index')}}">
            <i class="fas fa-arrow-left"></i>
            Volver
        </a>
    </div>
    <h2>Ver</h2>
    <h1>Horario académico</h1>
</div>
<div class="main-contenido">

    <div class="container-jbetween">
        <div>
            <span style="display: inline-block; margin-right: 0.7em;"><b>Periodo: </b>
                {{$horario->periodo()->first()->año}} - {{$horario->periodo()->first()->periodo}}</span>

            <span style="display: inline-block; margin-right: 0.7em;"><b>Total horas semanales: </b> {{ $horas}}</span>

            <span style="display: inline-block; margin-right: 0.7em;"><b>Total estudiantes: </b> {{$estudiantes}}</span>
        </div>
        @auth
        @if (Auth::user()->hasAnyRole(['Administrador', 'Director']))
        <div>
            <a href="{{ route('horarios.edit', $horario) }}" class="btn btn-primary"><i
                    class="fas fa-edit"></i>Editar</a>
        </div>
        @endif
        @endauth
    </div>

    <hr style="margin: 0;">

    <div class="filtros">
        <b>Información asignatura</b>
        <div class="group-inputs-2">
            <div>
                <label>Código</label>
                <input class="form-control" value="{{$horario->asignatura()->first()->codigo}}" readonly>
            </div>
            <div>
                <label>Nombre</label>
                <input class="form-control" value="{{$horario->asignatura()->first()->nombre}}" readonly>
            </div>
        </div>
        <hr>
        <b>Información docente</b>
        <div class="group-inputs-3">
            <div>
                <label>Identificación</label>
                <input class="form-control" value="{{$horario->docente()->first()->identificacion}}" readonly>
            </div>
            <div>
                <label>Nombres</label>
                <input class="form-control" value="{{$horario->docente()->first()->nombres}}" readonly>
            </div>
            <div>
                <label>Apellidos</label>
                <input class="form-control" value="{{$horario->docente()->first()->apellidos}}" readonly>
            </div>
        </div>
        <hr>
        <b style="margin-bottom: .5em;">Información horario</b>
        @foreach($horario->horarioDia()->get() as $dia)
        <div class="form-group group-inputs-7">
            <div>
                <label>Día</label>
                <input class="form-control" value="{{$dia->dia()->first()->nombre}}" readonly>
            </div>
            <div>
                <label>Frecuencia</label>
                <input class="form-control" value="{{$dia->frecuencia()->first()->nombre}}" readonly>
            </div>
            <div>
                <label>Hora inicio</label>
                <input class="form-control" type="time" value="{{$dia->hora}}" readonly>
            </div>
            <div>
                <label>Hora fin</label>
                <input class="form-control" type="text" value="{{$dia->horaFin()}}" readonly>
            </div>
            <div>
                <label>Sede</label>
                <input class="form-control" type="text"
                    value="{{ ($dia->salon()->first()) ? $dia->salon()->first()->sede()->nombre : 'Sin asignar'}}"
                    readonly>
            </div>
            @if($dia->salon()->first())
            @if($dia->salon()->first()->subsede())
            <div>
                <label>Subsede</label>
                <input class="form-control" type="text" value="{{$dia->salon()->first()->subsede()->first()->nombre}}"
                    readonly>
            </div>
            @endif
            @endif
            <div>
                <label>Salón</label>
                <input class="form-control" type="text"
                    value="{{ ($dia->salon()->first()) ? $dia->salon()->first()->nombre : 'Sin asignar'}}" readonly>
            </div>
        </div>
        @endforeach
        <hr style="margin-top: 0;">
        <b>Información grupos</b>
        @foreach($horario->grupos()->get() as $grupo)
        <div class="group-inputs-5">
            <div class="form-group">
                <label>Grupo</label>
                <input class="form-control" value="{{$grupo->nombre}}" readonly>
            </div>
            <div class="form-group">
                <label>Programa</label>
                <input class="form-control" value="{{$grupo->programa()->first()->nombre}}" readonly>
            </div>
            <div class="form-group">
                <label>Jornada</label>
                <input class="form-control" value="{{$grupo->jornadaAcademica()->first()->nombre}}" readonly>
            </div>
            <div class="form-group">
                <label>Sede</label>
                <input class="form-control" value="{{$grupo->sede()->first()->nombre}}" readonly>
            </div>
            <div class="form-group">
                <label>Estudiantes</label>
                <input class="form-control" value="{{$grupo->grupos_horarios->cantidad_estudiantes}}" readonly>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection