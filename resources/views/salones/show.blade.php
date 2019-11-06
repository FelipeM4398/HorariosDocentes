@extends('layouts.dashboard')

@section('contenido')

<div class="title-contenido">
    <div class="back">
        <a class="btn btn-link" href="{{route('salones.index')}}">
            <i class="fas fa-arrow-left"></i>
            Volver
        </a>
    </div>
    <h2>Salón</h2>
    <h1>{{ $salone->nombre }}</h1>
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
    <form method="post" action="{{route('salones.update', $salone)}}">
        @csrf
        @method('PUT')
        <div class="group-inputs-3">
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre"
                    placeholder="Ingrese el nombre del sal&oacute;n" value="{{ $salone->nombre }}" disabled="true">
            </div>
            <div class="form-group">
                <label for="nombre">Capacidad</label>
                <input type="number" class="form-control" id="capacidad" name="capacidad"
                    placeholder="Ingrese la capacidad del sal&oacute;n" value="{{ $salone->capacidad }}"
                    disabled="true">
            </div>
            <div class="form-group">
                <label for="id_tipo_salon">Tipos de sal&oacute;n</label>
                <select name="id_tipo_salon" id="tipo" class="form-control" required disabled="true">
                    <option value="">Seleccione un sal&oacute;n</option>
                    @foreach($tipoSalones as $tipoSalon)
                    <option value="{{$tipoSalon->id}}"
                        {{ ($tipoSalon->id == $salone->id_tipo_salon) ? 'selected' : '' }}>
                        {{$tipoSalon->nombre}}
                    </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="group-inputs-2">
            <div class="form-group">
                <label for="id_programa">Sede</label>
                <select name="id_sede" class="form-control" id="sede" disabled="true">
                    <option value="">Seleccione una sede</option>
                    @foreach($sedes as $sede)
                    <option value="{{$sede->id}}" {{ ($sede->id == $salone->id_sede) ? 'selected' : '' }}>
                        {{$sede->nombre}}
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="id_subsede">Subsede</label>
                <select name="id_subsede" class="form-control" id="subsede" disabled="true">
                    <option value="">Seleccione una subsede</option>
                    @foreach($subsedes as $subsede)
                    <option value="{{$subsede->id}}" {{ ($subsede->id == $salone->id_subsede) ? 'selected' : '' }}>
                        {{$subsede->nombre}}
                    </option>
                    @endforeach
                </select>
            </div>
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