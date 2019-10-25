@extends('layouts.dashboard')

@section('contenido')
<div class="title-contenido">
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

    <form>
        @csrf
        <span style="display: block; margin-bottom: 1rem;">Todos los campos son obligatorios.</span>

        <div class="form-group group-inputs-3 first-auto">
            <div>
                <label for="periodo">{{__('Periodo')}}</label>
                <select name="periodo" class="form-control" required>
                    <option value="">Seleccione el periodo</option>
                    @foreach($periodos as $periodo)
                    <option value="{{$periodo->id}}">Periodo {{$periodo->año}}-0{{$periodo->periodo}}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="docente">{{__('Docente')}}</label>
                <select name="docente" id="docente" class="form-control filter_docente">
                    <option value="">Seleccione el docente</option>
                    @foreach($docentes as $docente)
                    <option value="{{$docente->id}}">
                        {{$docente->identificacion}} - {{$docente->nombres}} {{$docente->apellidos}}
                    </option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="asignatura">{{__('Asignatura')}}</label>
                <select name="asignatura" id="asignatura" class="form-control filter_asignatura" required>
                    <option value="">Seleccione la asignatura</option>
                    @foreach($asignaturas as $asignatura)
                    <option value="{{$asignatura->id}}">
                        {{$asignatura->codigo}} - {{$asignatura->nombre}}
                    </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group" style="text-align: end;">
            <input type="checkbox" name="compartida" id="escompartida">
            <label class="form-check-label" for="escompartida">Asignatura compartida</label>
        </div>
        <div id="container-compartida" class="form-group hidden">
            <label for="asigs[]">{{__('Asignaturas compartidas')}}</label>
            <select name="asigs[]" id="asig_compartida" multiple>
                @foreach($asignaturas as $asignatura)
                <option value="{{$asignatura->id}}">
                    {{$asignatura->codigo}} - {{$asignatura->nombre}}
                </option>
                @endforeach
            </select>
        </div>
        <div class="buttons">
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