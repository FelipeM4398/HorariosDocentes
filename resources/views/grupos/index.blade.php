@extends('layouts.dashboard')

@section('contenido')
<div class="title-contenido">
    <h2>Ver</h2>
    <h1>Grupos</h1>
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
        <form method="POST" action="{{ route('grupos.index') }}">
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
            <a href="{{ route('grupos.create') }}" title="Nuevo grupo">
                <span class="icon text-success">
                    <i class="fas fa-plus-circle"></i>
                </span>
                <span class="text-dark">Registrar nuevo grupo</span>
            </a>
        </div>

    <table class="table table-hover table-ligth">
                <thead>
                    <tr>
                        <th scope="col">nombre</th>
                        <th scope="col">id programa</th>
                        <th scope="col">id jornada academica</th>
                        <th scope="col">id sede</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($grupos as $grupo)
                    <tr>
                        <td>{{ $grupo->	nombre }}</td>
                        <td>{{ $grupo->programa()->first()->nombre }}</td>
                        <td>{{ $grupo->jornadaAcademica()->first()->nombre }}</td>
                        <td>Sede {{ $grupo->sede()->first()->nombre }}</td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{$grupos->links()}}
            </div>
</div>
@stop