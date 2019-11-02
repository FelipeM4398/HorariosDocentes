@extends('layouts.dashboard')

@section('contenido')
<div class="title-contenido">
    <div class="back">
        <a class="btn btn-link" href="{{route('facultades.index')}}">
            <i class="fas fa-arrow-left"></i>
            Volver
        </a>
    </div>
    <h2>Registrar nueva</h2>
    <h1>Facultad</h1>
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
    <form method="post" action="{{route('facultades.store')}}">
        @csrf
        <span style="display: block; margin-bottom: 1rem;">Los campos marcados con (*) son obligatorios.</span>
        <div class="group-inputs-2">
            <div class="form-group">
                <label for="nombre">*Nombre</label>
                <input type="text" class="form-control" name="nombre" placeholder="Ingrese el nombre" required>
            </div>
            <div class="form-group">
                <label for="id_decano">Decanos</label>
                <select class="form-control" name="id_decano">
                    <option value="" selected>Seleccione un decano</option>
                    @foreach($decanos as $decano)
                    <option value="{{$decano->id}}">
                        {{$decano->identificacion}} - {{$decano->nombres}} {{$decano->apellidos}}
                    </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="descripcion">Descripci&oacute;n</label>
            <textarea style="white-space: unset;" rows="4" class="form-control" name="descripcion" placeholder="Ingrese una descripci&oacute;n">
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