@extends('layouts.dashboard')

@section('contenido')
@if(Auth::user()->hasRole('Administrador'))
<div class="back">
    <a class="btn btn-link" href="{{route('usuarios.show', $usuario)}}">
        <i class="fas fa-arrow-left"></i>
        Volver
    </a>
</div>
@endif
<div class="title-contenido">
    @if(Auth::user()->hasRole('Docente'))
    <h2>Mi</h2>
    <h1>Disponibilidad</h1>
    @else
    <h2>Usuario</h2>
    <h1>{{$usuario->nombres}} {{$usuario->apellidos}}</h1>
    @endif
</div>
<div class="content-dispo">
    <div class="container-list">
        <div class="filtros">
            @if(Auth::user()->hasRole('Docente'))
            <form method="POST" action="{{ route('disponibilidad.index') }}">
                @else
                <form method="POST" action="{{ route('disponibilidad.usuario', $usuario) }}">
                    @endif
                    @method('GET')
                    @csrf
                    <div class="title-filtro">{{ __('Filtros') }}</div>
                    <div class="form-group group-inputs-3">
                        <div class="form-group">
                            <label for="año">Año</label>
                            <input type="number" class="form-control" name="año" placeholder="Buscar por año" value="{{ old('año') }}">
                        </div>
                        <div class="form-group" style="padding-left: 40px;">
                            <label>Periodo</label>
                            <div class="group-inputs-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="periodo" id="1" value="1" @if(old('periodo')==1) checked @endif>
                                    <label class="form-check-label" for="1">
                                        1
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="periodo" id="2" value="2" @if(old('periodo')==2) checked @endif>
                                    <label class="form-check-label" for="2">
                                        2
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
                        <div class="form-group">
                            <span></span>
                            <button type="submit" class="btn btn-primary">
                                {{ __('Aplicar') }}
                            </button>
                        </div>
                    </div>
                </form>
        </div>
        @if($periodos->count() != 0)
        <div class="list-dispo">
            @foreach($periodos as $periodo)
            <div class="card-rol card-dispo">
                <div class="icon">
                    <i class="fas fa-calendar-check"></i>
                </div>
                <div class="text">
                    <h3>{{$periodo->año}}</h3>
                    <h2>Periodo {{$periodo->periodo}}</h2>
                    <a class="btn-link" href="#">
                        {{ __('Ver') }}
                    </a>
                </div>
            </div>
            @endforeach
        </div>
        {{$periodos->links()}}
        @else
        No encontramos registrada ninguna disponibilidad
        @endif
    </div>
</div>
@endsection