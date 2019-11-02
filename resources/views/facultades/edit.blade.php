@extends('layouts.dashboard')

@section('contenido')
<div class="title-contenido">
    <div class="back">
        <a class="btn btn-link" href="{{route('facultades.index')}}">
            <i class="fas fa-arrow-left"></i>
            Volver
        </a>
    </div>
    <h2>Facultad</h2>
    <h1>{{ $facultad->nombre }}</h1>
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
    <form method="post" action="{{route('facultades.update', $facultad)}}">
        @csrf
        @method('PUT')
        <div class="group-inputs-2">
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input value="{{ $facultad->nombre }}" type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese el nombre" disabled="true">
            </div>
            <div class="form-group">
                <label for="id_decano">Decano</label>
                <select class="form-control" id="decano" name="id_decano" disabled="true">
                    <option value="" selected>Seleccione un decano</option>
                    @foreach($decanos as $decano)
                    <option value="{{$decano->id}}" {{ ($decano->id == $facultad->id_decano) ? 'selected':'' }}>
                        {{$decano->identificacion}} - {{$decano->nombres}} {{$decano->apellidos}}
                    </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="descripcion">Descripci&oacute;n</label>
            <textarea style="white-space: unset;" rows="4" class="form-control" id="descripcion" name="descripcion" placeholder="Ingrese una descripci&oacute;n" disabled="true">
            {{ $facultad->descripcion }}
            </textarea>
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