@extends('layouts.dashboard')

@section('contenido')


<div class="title-contenido">
    <div class="back">
        <a class="btn btn-link" href="{{route('grupos.index')}}">
            <i class="fas fa-arrow-left"></i>
            Volver
        </a>
    </div>
    <h2>Registrar un</h2>
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
    <form method="post" action="{{route('grupos.store')}}">
        @csrf
        <span style="display: block; margin-bottom: 1rem;">Todos los campos son obligatorios.</span>
        <div class="group-inputs-2">
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" id="formGroupNombreInput" name="nombre" placeholder="Ingrese el nombre del grupo" required>
            </div>
            <div class="form-group">
                <label for="id_programa">Programa académico</label>
                <select name="id_programa" class="form-control" required>
                    <option value="">Seleccione un programa</option>
                    @foreach($programas as $programa)
                    <option value="{{$programa->id}}">{{$programa->nombre}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="group-inputs-2">
            <div class="form-group">
                <label for="id_jornada_academica">Jornada académica</label>
                <select name="id_jornada_academica" class="form-control">
                    <option value="">Seleccione una jornada</option>
                    @foreach($jornadas as $jornada)
                    <option value="{{$jornada->id}}">{{$jornada->nombre}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="id_sede">Sede</label>
                <select name="id_sede" class="form-control">
                    <option value="">Seleccione una sede</option>
                    @foreach($sedes as $sede)
                    <option value="{{$sede->id}}">Sede {{$sede->nombre}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="buttons">
            <button type="submit" class="btn btn-success">
                Registrar
            </button>
        </div>
    </form>
</div>
@endsection