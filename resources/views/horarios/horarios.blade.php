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
                <label for="periodo">{{__('Periodo')}}</label>
                <select name="periodo" id="periodo" class="form-control">
                    <option value="">Seleccione el periodo</option>
                    @foreach($periodos as $periodo)
                    <option value="{{$periodo->id}}">Periodo {{$periodo->año}}-0{{$periodo->periodo}}</option>
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
    <div class="table-responsive">
        <div class="action">
            <a href="{{ route('horarios.create') }}" title="Nueva disponibilidad">
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
                    <th scope="col">Docente</th>
                    <th scope="col">Asignatura</th>
                    <th scope="col">Ver más</th>
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
                    <th scope="row">{{ $horario->id_periodo }}</th>
                    <td>{{ $horario->id_docente }}</td>
                    <td>{{ $horario->id_asignatura }}</td>
                    <td style="text-align: center;">
                        <a class="btn btn-primary btn-sm" href="#">
                            <i class="fas fa-eye"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
                @endif
            </tbody>
        </table>
    </div>
</div>
@endsection