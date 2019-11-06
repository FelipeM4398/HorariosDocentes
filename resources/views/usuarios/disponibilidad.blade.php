@extends('layouts.dashboard')

@section('contenido')
<div class="title-contenido">
    @auth
    @if(Auth::user()->hasRole('Docente'))
    <h2>Mi</h2>
    <h1>Disponibilidad</h1>
    @endif
    @endauth
    <div class="back">
        <a class="btn btn-link" href="{{route('usuarios.show', $usuario)}}">
            <i class="fas fa-arrow-left"></i>
            Volver
        </a>
    </div>
    <h2>Usuario</h2>
    <h1>{{$usuario->nombres}} {{$usuario->apellidos}}</h1>
    <h3>Disponibilidad</h3>
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
            @auth
            @if(Auth::user()->hasRole('Docente'))
            <form method="POST" action="{{ route('disponibilidad.index') }}">
                @else
                <form method="POST" action="{{ route('usuarios.disponibilidad', $usuario) }}">
                    @endif
                    @endauth
                    @guest
                    <form method="POST" action="{{ route('usuarios.disponibilidad', $usuario) }}">
                        @endguest
                        @method('GET')
                        @csrf
                        <div class="title-filtro">{{ __('Filtros') }}</div>
                        <div class="group-inputs-2">
                            <div class="form-group" style="margin-right: 2rem;">
                                <label for="año">Año</label>
                                <input type="number" class="form-control" name="año" placeholder="Buscar por año"
                                    value="{{ old('año') }}">
                            </div>
                            <div class="form-group checks">
                                <label>Periodo</label>
                                <div class="group-inputs-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="periodo" id="1" value="1"
                                            @if(old('periodo')==1) checked @endif>
                                        <label class="form-check-label" for="1">
                                            Periodo 1
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="periodo" id="2" value="2"
                                            @if(old('periodo')==2) checked @endif>
                                        <label class="form-check-label" for="2">
                                            Periodo 2
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="periodo" id="3" value="3"
                                            @if(old('periodo')==3) checked @endif>
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

        @auth
        @if(Auth::user()->hasRole('Docente'))
        <div class="action">
            <a href="{{ route('disponibilidad.create') }}" title="Nueva disponibilidad">
                <span class="icon text-success">
                    <i class="fas fa-plus-circle"></i>
                </span>
                <span class="text-dark">Registrar una disponibilidad</span>
            </a>
        </div>
        @endif
        @endauth

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
                        <a class="btn-link text-white"
                            href="{{ route('periodo.disponibilidad', [$usuario, $periodo]) }}">
                            {{ __('Ver') }}
                        </a>

                        @auth
                        @if (Auth::user()->hasAnyRole(['Docente']))
                        <a class="btn-link text-white"
                            href="{{ route('periodo.disponibilidad', [Auth::user(), $periodo]) }}">
                            {{ __('Ver') }}
                        </a>
                        @endif
                        @endauth
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