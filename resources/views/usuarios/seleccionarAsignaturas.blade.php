@extends('layouts.dashboard')

@section('contenido')
<div class="title-contenido">
    <div class="back">
        <a class="btn btn-link" href="{{route('usuarios.asignaturas', Auth::user())}}">
            <i class="fas fa-arrow-left"></i>
            Volver
        </a>
    </div>
    <h2>Seleccionar</h2>
    <h1>Asignaturas</h1>
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
        <form method="POST" action="{{ route('usuarios.selectAsignaturas') }}">
            @method('GET')
            @csrf
            <div class="title-filtro">{{ __('Filtros') }}</div>
            <div class="group-inputs-2">
                <div class="form-group">
                    <label for="codigo">Código</label>
                    <input type="text" class="form-control" name="codigo" placeholder="Buscar por código" value="{{ old('codigo') }}" autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control" name="nombre" placeholder="Buscar por nombre" value="{{ old('nombre') }}" autocomplete="off">
                </div>
            </div>
            <div class="buttons">
                <button type="submit" class="btn btn-primary">
                    {{ __('Aplicar') }}
                </button>
            </div>
        </form>
    </div>


    <div class="table-responsive">
        <table class="table table-hover table-ligth">
            <thead>
                <tr>
                    <th scope="col">C&oacute;digo</th>
                    <th scope="col">Nombre</th>
                    <th scope="col" style="text-align: center;">Añadir</th>
                </tr>
            </thead>
            <tbody>
                @if($asignaturas->count() != 0)
                @foreach($asignaturas as $asignatura)
                <tr>
                    <td>{{ $asignatura->codigo }}</td>
                    <td>{{ $asignatura->nombre }}</td>
                    <td style="text-align: center;">
                        <a class="btn btn-success btn-sm" href="{{route('usuarios.asociar', $asignatura)}}">
                            <i class="fas fa-plus-circle"></i>
                        </a>
                    </td>
                    </td>
                </tr>
                @endforeach
                @else
                <tr>
                    <td colspan="3">No se encuentran asignaturas registradas</td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
    {{$asignaturas->appends(Request::except('_token', '_method'))->links()}}
</div>
@endsection