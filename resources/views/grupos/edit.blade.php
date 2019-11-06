@extends('layouts.dashboard')

@section('contenido')
<div class="title-contenido">
    <div class="back">
        <a class="btn btn-link" href="{{route('grupos.index')}}">
            <i class="fas fa-arrow-left"></i>
            Volver
        </a>
    </div>
    <h2>Editar un</h2>
    <h1>Grupo</h1>
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
    @if (session('error'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    <form method="post" action="{{route('grupos.update', $grupo)}}">
        @method('PUT')
        @csrf
        <div class="group-inputs-2">
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre"
                    placeholder="Ingrese el nombre del grupo" value="{{$grupo->nombre}}" disabled="true" required>
            </div>
            <div class="form-group">
                <label for="id_programa">Programa académico</label>
                <select name="id_programa" class="form-control" disabled="true" id="programa" required>
                    <option value="">Seleccione un programa</option>
                    @foreach($programas as $programa)
                    <option value="{{$programa->id}}" {{ ($grupo->id_programa == $programa->id) ? 'selected':'' }}>
                        {{$programa->nombre}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="group-inputs-2">
            <div class="form-group">
                <label for="id_jornada_academica">Jornada académica</label>
                <select name="id_jornada_academica" disabled="true" class="form-control" id="jornada" required>
                    <option value="">Seleccione una jornada</option>
                    @foreach($jornadas as $jornada)
                    <option value="{{$jornada->id}}"
                        {{ ($grupo->id_jornada_academica == $jornada->id) ? 'selected':'' }}>{{$jornada->nombre}}
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="id_sede">Sede</label>
                <select name="id_sede" disabled="true" class="form-control" id="sede" required>
                    <option value="">Seleccione una sede</option>
                    @foreach($sedes as $sede)
                    <option value="{{$sede->id}}" {{ ($grupo->id_sede == $sede->id) ? 'selected':'' }}>Sede
                        {{$sede->nombre}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        @auth
        @if (Auth::user()->hasAnyRole(['Administrador', 'Director']))
        <div class="form-group buttons">
            <button id="editar" type="button" class="btn btn-primary">
                {{ __('Editar') }}
            </button>
            <button id="cancelar" type="button" class="btn btn-danger hidden">
                {{ __('Cancelar') }}
            </button>
            <button id="cambios" type="submit" class="btn btn-success hidden">
                {{ __('Guardar cambios') }}
            </button>
        </div>
        @endif
        @endauth
    </form>
</div>
@endsection

@section('scripts')
<script src="{{ asset('js/informacion.js') }}"></script>
@endsection