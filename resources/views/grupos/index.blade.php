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
                    <label for="codigo">Nombre</label>
                    <input type="text" class="form-control" name="nombre" placeholder="Buscar por nombre" value="{{ old('nombre') }}" autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="nombre">Programa académico</label>
                    <select name="programa" class="form-control">
                        <option value="">Buscar por programa</option>
                        @foreach($programas as $programa)
                        <option value="{{$programa->id}}" @if(old('programa')==$programa->id) selected @endif>{{$programa->nombre}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="group-inputs-2">
                <div class="form-group">
                    <label for="jornada">Jornada</label>
                    <select name="jornada" class="form-control">
                        <option value="">Buscar por jornada</option>
                        @foreach($jornadas as $jornada)
                        <option value="{{$jornada->id}}" @if(old('jornada')==$jornada->id) selected @endif>{{$jornada->nombre}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="sede">Sede</label>
                    <select name="sede" class="form-control">
                        <option value="">Buscar por sede</option>
                        @foreach($sedes as $sede)
                        <option value="{{$sede->id}}" @if(old('sede')==$sede->id) selected @endif>Sede {{$sede->nombre}}</option>
                        @endforeach
                    </select>
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
                    <th scope="col">Nombre</th>
                    <th scope="col">Programa académico</th>
                    <th scope="col">Jornada académica</th>
                    <th scope="col">Sede</th>
                    <th scope="col" style="text-align: center;">Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($grupos as $grupo)
                <tr>
                    <td>{{ $grupo->	nombre }}</td>
                    <td>{{ $grupo->programa()->first()->nombre }}</td>
                    <td>{{ $grupo->jornadaAcademica()->first()->nombre }}</td>
                    <td>Sede {{ $grupo->sede()->first()->nombre }}</td>
                    <td style="text-align: center;">
                        <a class="btn btn-primary btn-sm" href="{{ route('grupos.edit', $grupo)}}">
                            <i class="fas fa-eye"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{$grupos->appends(Request::except('_token', '_method'))->links()}}
    </div>
</div>
@stop