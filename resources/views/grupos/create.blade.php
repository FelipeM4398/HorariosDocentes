@extends('layouts.dashboard')

@section('contenido')
 
 
<div class="title-contenido">
    <div class="back">
        <a class="btn btn-link" href="{{route('grupos.index')}}">
            <i class="fas fa-arrow-left"></i>
            Volver
        </a>
    </div>
    <h2>Registrar nuevo</h2>
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
    <form method="post" action="{{route('grupos.store')}}">
        @csrf
        <span style="display: block; margin-bottom: 1rem;">Todos los campos son obligatorios.</span>
        <div class="group-inputs-6">
            <div class="form-group">
                <label for="nombre">Nombre grupo*</label>
                <input type="text" class="form-control" id="formGroupNombreInput" name="nombre" placeholder="Ingrese nombre grupo*" required>
                </div>
            <div class="group-inputs-6">
                <div class="form-group">
                    <label for="id_programa">Id del programa*</label>
                    <input type="text" class="form-control" id="formGroupId_programaInput" name="id_programa" placeholder="ingrese id del programa*" required>
                </div>
                <div class="form-group">
                    <label for="id_jornada_academica">Id de jornada academica</label>
                    <input type="text" class="form-control" id="formGroupId_jornada_academicaInput" name="id_jornada_academica" placeholder="ingrese id de jornada academica*" required>
                </div>
                <div class="form-group">
                    <label for="id_sede">Id de sede</label>
                    <input type="text" class="form-control" id="formGroupId_sedeInput" name="id_sede" placeholder="Ingrese id de sede*" required>
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