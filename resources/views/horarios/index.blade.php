@extends('layouts.dashboard')

@section('contenido')
<div class="title-contenido">
    <h2>Horarios</h2>
    <h1>Académicos</h1>
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

    <div class="filtros">
        <form method="POST" action="{{ route('horarios.index') }}">
            @method('GET')
            @csrf
            <div class="form-group">
                <label for="periodo_id">{{__('Periodo')}}</label>
                <select name="periodo_id" class="form-control">
                    <option value="">Seleccione el periodo</option>
                    @foreach($periodos as $periodo)
                    <option value="{{$periodo->id}}" @if(old('periodo_id')==$periodo->id) selected @endif>Periodo {{$periodo->año}}-0{{$periodo->periodo}}</option>
                    @endforeach
                </select>
            </div>
            <div class="buttons">
                <button type="submit" class="btn btn-primary">
                    {{ __('Aplicar') }}
                </button>
            </div>
        </form>
    </div>
    <div class="table-responsive-xl">
        <div class="action">
            <a href="{{ route('horarios.create') }}" title="Nuevo horario">
                <span class="icon text-success">
                    <i class="fas fa-plus-circle"></i>
                </span>
                <span class="text-dark">Registrar un horario</span>
            </a>
        </div>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">Periodo</th>
                    <th scope="col">CC</th>
                    <th scope="col">Docente</th>
                    <th scope="col">Código</th>
                    <th scope="col">Asignatura</th>
                    <!-- <th scope="col">Grupos</th>
                    <th scope="col">Días</th> -->
                    <th scope="col" style="text-align: center;">Ver más</th>
                </tr>
            </thead>
            <tbody>
                @if($horarios->count() == 0)
                <tr>
                    <td colspan="4">No se encuentraron horarios registrados</td>
                </tr>
                @else
                @foreach($horarios as $horario)
                <tr>
                    <th scope="row">{{ $horario->periodo()->first()->año }} - {{ $horario->periodo()->first()->periodo }}</th>
                    <td>{{ $horario->docente()->first()->identificacion }}</td>
                    <td>{{ $horario->docente()->first()->nombres }}</td>
                    <td>{{ $horario->asignatura()->first()->codigo }}</td>
                    <td>{{ $horario->asignatura()->first()->nombre }}</td>
                    <!-- <td>
                        @foreach($horario->grupos as $grupo)
                        {{ $grupo->nombre }},
                        @endforeach
                    </td>
                    <td>
                        @foreach($horario->horarioDia as $dia)
                        {{ $dia->dia()->first()->nombre }},
                        @endforeach
                    </td> -->
                    <td style="text-align: center;">
                        <a class="btn btn-primary btn-sm" href="{{route('horarios.show', $horario)}}">
                            <i class="fas fa-eye"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
                @endif
            </tbody>
        </table>
        {{$horarios->appends(Request::except('_token', '_method'))->links()}}
    </div>
</div>
@endsection