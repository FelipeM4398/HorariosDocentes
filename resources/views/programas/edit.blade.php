@extends('layouts.dashboard')

@section('contenido')
<div class="title-contenido">
    <div class="back">
        <a class="btn btn-link" href="{{route('programas.index')}}">
            <i class="fas fa-arrow-left"></i>
            Volver
        </a>
    </div>
    <h2>Programa académico</h2>
    <h1>{{ $programa->nombre }}</h1>
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
    <form method="post" action="{{route('programas.update', $programa)}}">
        @csrf
        @method('PUT')
        <div class="group-inputs-2">
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input value="{{ $programa->nombre }}" type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese el nombre" disabled="true">
            </div>
            <div class="group-inputs-2">
                <div class="form-group">
                    <label for="id_tipo_programa">Tipo de programa</label>
                    <select class="form-control" id="tipo_programa" name="id_tipo_programa" disabled="true" required>
                        <option selected>Seleccione un tipo de programa</option>
                        @foreach($tipoProgramas as $tipoPrograma)
                        <option value="{{$tipoPrograma->id}}" {{ ($programa->id_tipo_programa == $tipoPrograma->id) ? 'selected':'' }}>
                            {{$tipoPrograma->nombre}}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="duracion">Duraci&oacute;n</label>
                    <input value="{{ $programa->duracion }}" type="number" step="1" class="form-control" id="duracion" name="duracion" placeholder="Duraci&oacute;n" disabled="true" required>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="descripcion">Descripci&oacute;n</label>
            <textarea style="white-space: unset;" rows="4" class="form-control" id="descripcion" name="descripcion" placeholder="Ingrese una descripci&oacute;n" disabled="true">
            {{ $programa->descripcion }}
            </textarea>
        </div>
        <div class="group-inputs-3">
            <div class="form-group">
                <label for="id_facultad">Facultad</label>
                <select class="form-control" id="facultad" name="id_facultad" disabled="true" required>
                    <option selected>Seleccione una facultad</option>
                    @foreach($facultades as $facultad)
                    <option value="{{$facultad->id}}" {{ ($programa->id_facultad == $facultad->id) ? 'selected':'' }}>
                        {{$facultad->nombre}}
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="id_director">Director</label>
                <select class="form-control" id="director" name="id_director" disabled="true">
                    <option>Seleccione un director</option>
                    @foreach($directores as $director)
                    <option value="{{$director->id}}" {{ ($programa->id_director == $director->id) ? 'selected':'' }}>
                        {{$director->nombres}} {{$director->apellidos}}
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="id_modalidad">Modalidad</label>
                <select class="form-control" id="modalidad" name="id_modalidad" disabled="true" required>
                    <option selected>Seleccione una modalidad</option>
                    @foreach($modalidades as $modalidad)
                    <option value="{{$modalidad->id}}" {{ ($programa->id_modalidad == $modalidad->id) ? 'selected':'' }}>
                        {{$modalidad->nombre}}
                    </option>
                    @endforeach
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