@extends('layouts.dashboard')

@section('contenido')


<div class="title-contenido">
    <div class="back">
        <a class="btn btn-link" href="{{route('salones.index')}}">
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
    <form method="post" action="{{route('salones.store')}}">
        @csrf
        <span style="display: block; margin-bottom: 1rem;">Todos los campos son obligatorios.</span>
        <div class="group-inputs-2">
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" id="formGroupNombreInput" name="nombre" placeholder="Ingrese el nombre del sal&oacute;n" required>
            </div>
            <div class="form-group">
                <label for="nombre">Cantidad</label>
                <input type="number" class="form-control" id="formGroupNombreInput" name="capacidad" placeholder="Ingrese la cantidad del sal&oacute;n" required>
            </div>
        </div>
        <div class="group-inputs-2">
            <div class="form-group">
                <label for="id_programa">Sedes</label>
                <select name="id_sede" class="form-control">
                    <option value="">Seleccione una sede</option>
                    @foreach($sedes as $sede)
                        <option value="{{$sede->id}}">Sede {{$sede->nombre}}</option>
                    @endforeach
                </select>
            </div>
           {{-- <div class="form-group">
                <label for="id_programa">Sub sedes</label>
                <select name="id_programa" class="form-control" required>
                    <option value="">Seleccione una sun sede</option>
                    @foreach($subSedes as $subSede)
                        <option value="{{$subSede->id}}">{{$subSede->nombre}}</option>
                    @endforeach
                </select>
            </div>--}}
        </div>
        <div class="form-group">
            <label for="id_tipo_salon">Tipos de sal&oacute;n</label>
            <select name="id_tipo_salon" class="form-control" required>
                <option value="">Seleccione un sal&oacute;n</option>
                @foreach($tipoSalones as $tipoSalon)
                    <option value="{{$tipoSalon->id}}">{{$tipoSalon->nombre}}</option>
                @endforeach
            </select>
        </div>
        <div class="buttons">
            <button type="submit" class="btn btn-success">
                Registrar
            </button>
        </div>
    </form>
</div>
@endsection
