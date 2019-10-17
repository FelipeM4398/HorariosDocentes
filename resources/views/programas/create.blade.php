@extends('layouts.dashboard')

@section('contenido')
<div class="title-contenido">
    <div class="back">
        <a class="btn btn-link" href="{{route('programas.index')}}">
            <i class="fas fa-arrow-left"></i>
            Volver
        </a>
    </div>
    <h2>Registrar nuevo</h2>
    <h1>Programa académico</h1>
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
    <form method="post" action="{{route('programas.store')}}">
        @csrf
        <span style="display: block; margin-bottom: 1rem;">Los campos marcados con (*) son obligatorios.</span>
        <div class="group-inputs-2">
            <div class="form-group">
                <label for="nombre">*Nombre</label>
                <input type="text" class="form-control" name="nombre" placeholder="Ingrese el nombre" required>
            </div>
            <div class="group-inputs-2">
                <div class="form-group">
                    <label for="id_tipo_programa">*Tipo de programa</label>
                    <select class="form-control" name="id_tipo_programa" required>
                        <option value="" selected>Seleccione un tipo de programa</option>
                        @foreach($tipoProgramas as $tipoPrograma)
                        <option value="{{$tipoPrograma->id}}">
                            {{$tipoPrograma->nombre}}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="duracion">*Duraci&oacute;n</label>
                    <input type="number" step="1" class="form-control" name="duracion" placeholder="Ingrese la duraci&oacute;n" required>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="descripcion">Descripci&oacute;n</label>
            <textarea style="white-space: unset;" rows="4" class="form-control" name="descripcion" placeholder="Ingrese una descripci&oacute;n">
            </textarea>
        </div>
        <div class="group-inputs-3">
            <div class="form-group">
                <label for="id_facultad">*Facultad</label>
                <select class="form-control" name="id_facultad" required>
                    <option value="" selected>Seleccione una facultad</option>
                    @foreach($facultades as $facultad)
                    <option value="{{$facultad->id}}">
                        {{$facultad->nombre}}
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="id_director">Director</label>
                <select class="form-control" name="id_director">
                    <option value="" selected>Seleccione un director</option>
                    @foreach($directores as $director)
                    <option value="{{$director->id}}">
                        {{$director->nombres}} {{$director->apellidos}}
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="id_modalidad">*Modalidad</label>
                <select class="form-control" id="modalidad" name="id_modalidad" required>
                    <option value="" selected>Seleccione una modalidad</option>
                    @foreach($modalidades as $modalidad)
                    <option value="{{$modalidad->id}}">
                        {{$modalidad->nombre}}
                    </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group buttons">
            <button type="submit" class="btn btn-success">
                {{ __('Registrar') }}
            </button>
        </div>
    </form>
</div>
@endsection