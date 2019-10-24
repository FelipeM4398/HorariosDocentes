@extends('layouts.dashboard')

@section('contenido')
<div class="title-contenido">
    <div class="back">
        <a class="btn btn-link" href="{{route('periodos.index')}}">
            <i class="fas fa-arrow-left"></i>
            Volver
        </a>
    </div>
    <h2>Periodo</h2>
    <h1>{{$periodo->año}} - {{$periodo->periodo}}</h1>
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

    <form method="post" action="{{route('periodos.update', $periodo)}}">
        @method('PUT')
        @csrf
        <div class="group-inputs-2">
            <div class="form-group">
                <label for="año">Año</label>
                <input type="number" class="form-control" id="año" name="año" value="{{$periodo->año}}" disabled="true">
            </div>
            <div class="form-group">
                <label for="periodo">Periodo</label>
                <select name="periodo" id="periodo" class="form-control" disabled="true" required>
                    <option value="">Seleccione un periodo</option>
                    <option value="1" {{ ($periodo->periodo == 1) ? 'selected' : '' }}>1</option>
                    <option value="2" {{ ($periodo->periodo == 2) ? 'selected' : '' }}>2</option>
                </select>
            </div>
        </div>
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
    </form>
</div>
@endsection

@section('scripts')
<script src="{{ asset('js/informacion.js') }}"></script>
@endsection