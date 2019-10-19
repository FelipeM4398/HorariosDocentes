@extends('layouts.dashboard')

@section('contenido')
<div class="title-contenido">
    <h2>Programas</h2>
    <h1>Académicos</h1>
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
    <div class="filtros">
        <form method="POST" action="{{ route('programas.index') }}">
            @method('GET')
            @csrf
            <div class="title-filtro">{{ __('Filtros') }}</div>
            <div class="group-inputs-3">
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input id="nombre" type="text" class="form-control" name="nombre" placeholder="Buscar por nombre" value="{{ old('nombre') }}" autocomplete="off">
                </div>
                <div class="form-goup">
                    <label for="modalidad">Modalidad</label>
                    <select name="modalidad" class="form-control">
                        <option value="">Buscar por modalidad</option>
                        @foreach($modalidades as $modalidad)
                        <option value="{{$modalidad->id}}" @if(old('modalidad')==$modalidad->id) selected @endif>{{$modalidad->nombre}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="tipo">Tipo de programa</label>
                    <select name="tipo" class="form-control">
                        <option value="">Buscar por tipo</option>
                        @foreach($tipoProgramas as $tipoPrograma)
                        <option value="{{$tipoPrograma->id}}" @if(old('tipo')==$tipoPrograma->id) selected @endif>{{$tipoPrograma->nombre}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="buttons">
                <button type="submit" class="btn btn-primary">
                    {{ __('Aplicar') }}
                </button>
            </div>
        </form>
    </div>
    <div class="table-responsive">
        <div class="action">
            <a href="{{ route('programas.create') }}" title="Nuevo programa">
                <span class="icon text-success">
                    <i class="fas fa-plus-circle"></i>
                </span>
                <span class="text-dark">Registrar nuevo programa</span>
            </a>
        </div>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Modalidad</th>
                    <th scope="col">Tipo de programa</th>
                    <th scope="col" style="text-align: center;">Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($programas as $programa)
                <tr>
                    <td scope="row">{{ $programa->nombre }}</td>
                    <td scope="row">{{ $programa->modalidad->nombre }}</td>
                    <td scope="row">{{ $programa->tipoPrograma->nombre }}</td>

                    <td style="text-align: center;">
                        <a class="btn btn-primary btn-sm" href="{{ route('programas.edit', $programa)}}">
                            <i class="fas fa-eye"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{$programas->appends(Request::except('_token', '_method'))->links()}}
</div>
@endsection