@extends('layouts.dashboard')

@section('contenido')
<div class="title-contenido">
    @if(Auth::user()->hasRole('Docente'))
    <h2>Mi</h2>
    <h1>Disponibilidad</h1>
    @else
    @if(Auth::user()->hasRole('Administrador'))
    <div class="back">
        <a class="btn btn-link" href="{{route('usuarios.show', $usuario)}}">
            <i class="fas fa-arrow-left"></i>
            Volver
        </a>
    </div>
    @endif
    <h2>Usuario</h2>
    <h1>{{$usuario->nombres}} {{$usuario->apellidos}}</h1>
    <h3>Disponibilidad</h3>
    @endif
</div>
<div class="main-contenido">
    <div class="container-list">
        @if (session('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('status') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        <div class="filtros">
            @if(Auth::user()->hasRole('Docente'))
            <form method="POST" action="{{ route('disponibilidad.index') }}">
                @else
                <form method="POST" action="{{ route('usuarios.disponibilidad', $usuario) }}">
                    @endif
                    @method('GET')
                    @csrf
                    <div class="title-filtro">{{ __('Filtros') }}</div>
                    <div class="group-inputs-2">
                        <div class="form-group" style="margin-right: 2rem;">
                            <label for="año">Año</label>
                            <input type="number" class="form-control" name="año" placeholder="Buscar por año" value="{{ old('año') }}">
                        </div>
                        <div class="form-group checks">
                            <label>Periodo</label>
                            <div class="group-inputs-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="periodo" id="1" value="1" @if(old('periodo')==1) checked @endif>
                                    <label class="form-check-label" for="1">
                                        Periodo 1
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="periodo" id="2" value="2" @if(old('periodo')==2) checked @endif>
                                    <label class="form-check-label" for="2">
                                        Periodo 2
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="periodo" id="3" value="3" @if(old('periodo')==3) checked @endif>
                                    <label class="form-check-label" for="3">
                                        Todos
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group buttons">
                        <span></span>
                        <button type="submit" class="btn btn-primary">
                            {{ __('Aplicar') }}
                        </button>
                    </div>
                </form>
        </div>
        @if(Auth::user()->hasRole('Docente'))
        <a href="{{ route('disponibilidad.create') }}" class="action text-success" title="Registrar disponibilidad">
            <i class="fas fa-plus-circle"></i>
        </a>
        @endif
        @if($periodos->count() != 0)
        <div class="list-dispo">
            @foreach($periodos as $periodo)
            <div class="block block-yellow">
                <div class="block-icon">
                    <i class="fas fa-calendar-check"></i>
                </div>
                <div class="block-text">
                    <div>
                        <h3>{{$periodo->año}}</h3>
                        <h2>Periodo {{$periodo->periodo}}</h2>
                        @if(Auth::user()->hasRole('Administrador'))
                        <a class="btn-link text-white" href="{{ route('periodo.disponibilidad', [$usuario, $periodo]) }}">
                            {{ __('Ver') }}
                        </a>
                        @else
                        <a class="btn-link text-white" href="{{ route('periodo.disponibilidad', [Auth::user(), $periodo]) }}">
                            {{ __('Ver') }}
                        </a>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        {{$periodos->appends(Request::except('page'))->links()}}
        @else
        No encontramos registrada ninguna disponibilidad
        @endif
    </div>
</div>
@endsection