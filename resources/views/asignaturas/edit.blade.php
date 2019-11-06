@extends('layouts.dashboard')

@section('contenido')
<div class="title-contenido">
    <div class="back">
        <a class="btn btn-link" href="{{route('asignaturas.index')}}">
            <i class="fas fa-arrow-left"></i>
            Volver
        </a>
    </div>
    <h2>Asignatura</h2>
    <h1>{{ $asignatura->nombre }}</h1>
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
    <form method="post" action="{{route('asignaturas.update', $asignatura)}}">
        @method('PUT')
        @csrf
        <div class="group-inputs-2">
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre"
                    value="{{$asignatura->nombre}}" disabled="true">
            </div>
            <div class="group-inputs-2">
                <div class="form-group">
                    <label for="codigo">C&oacute;digo</label>
                    <input type="text" class="form-control" id="codigo" name="codigo" placeholder="C&oacute;digo"
                        value="{{$asignatura->codigo}}" disabled="true">
                </div>
                <div class="form-group">
                    <label for="creditos">Cr&eacute;ditos</label>
                    <input type="number" class="form-control" id="creditos" name="creditos"
                        placeholder="Cr&eacute;ditos" value="{{$asignatura->creditos}}" disabled="true">
                </div>
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