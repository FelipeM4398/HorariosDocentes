@extends('layouts.dashboard')

@section('contenido')
<div class="title-contenido">
    <h2>Ver</h2>
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
        <form method="POST" action="{{ route('asignaturas.index') }}">
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

        <div class="action">
            <a href="{{ route('asignaturas.create') }}" class="action" title="Nueva asignatura">
                <span class="icon text-success">
                    <i class="fas fa-plus-circle"></i>
                </span>
                <span class="text-dark">Registrar nueva asignatura</span>
            </a>
        </div>
        <table class="table table-hover table-ligth">
            <thead>
                <tr>
                    <th scope="col">C&oacute;digo</th>
                    <th scope="col">Nombre</th>
                    <th scope="col" style="text-align: center;">Cr&eacute;ditos</th>
                    <th scope="col" style="text-align: center;">Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($asignaturas as $asignatura)
                <tr>
                    <td>{{ $asignatura->codigo }}</td>
                    <td>{{ $asignatura->nombre }}</td>
                    <td style="text-align: center;">{{ $asignatura->creditos }}</td>
                    <td style="text-align: center;">
                        <a class="btn btn-primary btn-sm" href="{{ route('asignaturas.edit', $asignatura)}}">
                            <i class="fas fa-eye"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{$asignaturas->appends(Request::except('_token', '_method'))->links()}}
</div>
@stop