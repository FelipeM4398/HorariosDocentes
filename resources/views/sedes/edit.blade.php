@extends('layouts.dashboard')

@section('contenido')
<div class="title-contenido">
    <div class="back">
        <a class="btn btn-link" href="{{route('sedes.index')}}">
            <i class="fas fa-arrow-left"></i>
            Volver
        </a>
    </div>
    <h2>Sedes</h2>
    <h1>{{ $sede->nombre }}</h1>
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
    <form method="post" action="{{route('sedes.update', $sede)}}">
        @csrf
        @method('PUT')
        <div>
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input value="{{ $sede->nombre }}" type="text" class="form-control" id="nombre" name="nombre"
                    placeholder="Ingrese el nombre" disabled="true">
            </div>
        </div>
        <div class="form-group">
            <label for="direccion">Direcci&oacute;n</label>
            <textarea style="white-space: unset;" rows="4" class="form-control" id="direccion" name="direccion"
                placeholder="Ingrese una direcci&oacute;n" disabled="true">
            {{ $sede->direccion }}
            </textarea>
        </div>

        @auth
        @if (Auth::user()->hasAnyRole(['Administrador', 'Coordinacion']))
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