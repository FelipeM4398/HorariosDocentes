@extends('layouts.dashboard')

@section('contenido')


    <div class="title-contenido">
        <div class="back">
            <a class="btn btn-link" href="{{route('salones.index')}}">
                <i class="fas fa-arrow-left"></i>
                Volver
            </a>
        </div>
        <h2>Grupo</h2>
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
            @csrf
            <div class="group-inputs-2">
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control" id="formGroupNombreInput" name="nombre" placeholder="Ingrese el nombre del sal&oacute;n" value="{{ $salone->nombre }}" disabled>
                </div>
                <div class="form-group">
                    <label for="nombre">Cantidad</label>
                    <input type="number" class="form-control" id="formGroupNombreInput" name="capacidad" placeholder="Ingrese la cantidad del sal&oacute;n"  value="{{ $salone->capacidad }}" disabled>
                </div>
            </div>
            <div class="group-inputs-2">
                <div class="form-group">
                    <label for="id_programa">Sedes</label>
                    <input type="text" class="form-control" id="formGroupNombreInput" name="nombre" placeholder="Ingrese el nombre del sal&oacute;n" value="{{ $salone->sede->nombre }}" disabled>
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
                <input type="text" class="form-control" id="formGroupNombreInput" name="nombre" placeholder="Ingrese el nombre del sal&oacute;n" value="{{ $salone->tipoSalon->nombre }}" disabled>
            </div>
    </div>
@endsection
