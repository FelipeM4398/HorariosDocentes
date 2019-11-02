@extends('layouts.dashboard')

@section('contenido')
<div class="title-contenido">
    <div class="back">
        <a class="btn btn-link" href="{{route('sedes.index')}}">
            <i class="fas fa-arrow-left"></i>
            Volver
        </a>
    </div>
    <h2>Registrar nueva</h2>
    <h1>Sede</h1>
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
    <form method="post" action="{{route('sedes.store')}}">
        @csrf
        <span style="display: block; margin-bottom: 1rem;">Los campos marcados con (*) son obligatorios.</span>
        <div>
            <div class="form-group">
                <label for="nombre">*Nombre</label>
                <input type="text" class="form-control" name="nombre" placeholder="Ingrese el nombre" required>
            </div>
        </div>
        <div class="form-group">
            <label for="direccion">Direcci&oacute;n</label>
            <textarea style="white-space: unset;" rows="4" class="form-control" name="direccion" placeholder="Ingrese una direcci&oacute;n">
            </textarea>
        </div>
        <div class="form-group buttons">
            <button type="submit" class="btn btn-success">
                {{ __('Registrar') }}
            </button>
        </div>
    </form>
</div>
@endsection