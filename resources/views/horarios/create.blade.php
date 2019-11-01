@extends('layouts.dashboard')

@section('contenido')
<div class="title-contenido">
    <div class="back">
        <a class="btn btn-link" href="{{route('horarios.index')}}">
            <i class="fas fa-arrow-left"></i>
            Volver
        </a>
    </div>
    <h2>Registrar nuevo</h2>
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
                    <option value="{{$periodo->id}}">Periodo {{$periodo->año}}-0{{$periodo->periodo}}</option>
                    @endforeach
                </select>
            </div>
            <div id="content-docente">
                <label for="docente">{{__('Docente')}}</label>
                <select name="docente" id="docente" class="form-control filter_docente docente">
                    <option value="">Seleccione el docente</option>

                </select>
            </div>
            <div>
                <label for="asignatura">{{__('Asignatura')}}</label>
                <select name="asignatura" id="asignatura" class="form-control filter_asignatura" required>
                    <option value="">Seleccione la asignatura</option>
                </select>
            </div>
        </div>
        <hr>
        <div id="panel-groups">
            <div class="form-group group-inputs-3 last-auto">
                <div>
                    <label>Grupo</label>
                    <select name="grupos[]" class="form-control filter_grupo" required>
                        <option value="">Seleccione un grupo</option>
                        @foreach($grupos as $grupo)
                        <option value="{{$grupo->id}}">
                            {{$grupo->nombre}} - {{$grupo->sede->nombre}} - {{$grupo->jornadaAcademica->nombre}} - {{$grupo->programa->nombre}}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label>Cantidad de estudiantes</label>
                    <input name="cantidad[]" class="form-control" type="number" placeholder="Ingrese la cantidad de estudiantes" required>
                </div>
                <div class="item-end">
                    <button class="btn btn-success" id="add_grupo" type="button" title="Añadir grupo"><i class="fas fa-plus-circle"></i></button>
                </div>
            </div>
        </div>
        <hr>
        <div id="panel-dias">
            <div class="form-group group-inputs-5 last-auto">
                <div>
                    <label>Día</label>
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
                    <label>Frecuencia</label>
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
                    <label>Hora de inicio</label>
                    <input type="time" name="horas[]" class="form-control" placeholder="Ingrese la hora de inicio" min="07:00" max="21:30" required>
                </div>
                <div>
                    <label>Cantidad de horas</label>
                    <input name="cantidad_horas[]" step="any" class="form-control" type="number" placeholder="Ingrese la cantidad de horas" required>
                </div>
                <div class="item-end">
                    <button class="btn btn-success" id="add-dia" type="button" title="Añadir día"><i class="fas fa-plus-circle"></i></button>
                </div>
            </div>
        </div>
        <hr>
        <div class="form-group buttons">
            <button type="submit" class="btn btn-primary">
                {{ __('Siguiente') }}
            </button>
        </div>
    </form>
</div>
@endsection

@section('scripts')
<script src="{{ asset('js/horario.js')}}"></script>
@endsection