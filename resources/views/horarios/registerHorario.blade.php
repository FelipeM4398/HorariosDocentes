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
                <select name="docente" id="docente" class="form-control multiple">
                    <option value="">Seleccione el docente</option>
                </select>
            </div>
            <div>
                <label for="asignatura">{{__('Asignatura')}}</label>
                <select name="asignatura" id="asignatura" class="form-control">
                    <option value="">Seleccione la asignatura</option>
                </select>
            </div>
        </div>
        <div class="buttons">
            <button type="submit" class="btn btn-primary">
                {{ __('Registrar') }}
            </button>
        </div>
    </form>
</div>
@endsection