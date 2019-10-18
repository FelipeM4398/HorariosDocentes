@extends('layouts.dashboard')

@section('contenido')
<div class="title-contenido">
    <div class="back">
        <a class="btn btn-link" href="{{route('asignaturas.index')}}">
            <i class="fas fa-arrow-left"></i>
            Volver
        </a>
    </div>
    <h2>Registrar nueva</h2>
    <h1>Asignatura</h1>
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
    <form method="post" action="{{route('asignaturas.store')}}">
        @csrf
        <span style="display: block; margin-bottom: 1rem;">Todos los campos son obligatorios.</span>
        <div class="group-inputs-2">
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" name="nombre" autocomplete="off" placeholder="Ingrese el nombre">
            </div>
            <div class="group-inputs-2">
                <div class="form-group">
                    <label for="codigo">C&oacute;digo</label>
                    <input type="text" class="form-control" name="codigo" autocomplete="off" placeholder="Ingrese el c&oacute;digo">
                </div>
                <div class="form-group">
                    <label for="creditos">Cr&eacute;ditos</label>
                    <input type="number" class="form-control" autocomplete="off" name="creditos" placeholder="Ingrese los cr&eacute;ditos">
                </div>
            </div>
        </div>
        <div class="form-group buttons">
            <button type="submit" class="btn btn-success">
                Registrar
            </button>
        </div>
    </form>
</div>
@endsection