@extends('layouts.dashboard')

@section('contenido')
<div class="title-contenido">
    <h2>Ver</h2>
    <h1>Sedes</h1>
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
        <form method="POST" action="{{ route('sedes.index') }}">
            @method('GET')
            @csrf
            <div class="title-filtro">{{ __('Filtros') }}</div>
            <div class="group-inputs-2">
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control" name="nombre" placeholder="Buscar por nombre"
                        value="{{ old('nombre') }}" autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="direccion">Dirección</label>
                    <input type="text" class="form-control" name="direccion" placeholder="Buscar por direccion"
                        value="{{ old('direccion') }}" autocomplete="off">
                </div>
            </div>
            <div class="buttons">
                <button type="submit" class="btn btn-primary">
                    {{ __('Aplicar') }}
                </button>
        </form>
    </div>
</div>
<div class="table-responsive">
    @auth
    @if (Auth::user()->hasAnyRole(['Administrador', 'Coordinacion']))
    <div class="action" style="display: inline-block;">
        <a href="{{ route('sedes.create') }}" title="Nueva sede">
            <span class="icon text-success">
                <i class="fas fa-plus-circle"></i>
            </span>
            <span class="text-dark">Registrar una nueva sede</span>
        </a>
    </div>
    <div class="action" style="display: inline-block;">
        <a href="{{ route('subsedes.create') }}" title="Nueva Subsede">
            <span class="icon text-success">
                <i class="fas fa-plus-circle"></i>
            </span>
            <span class="text-dark">Registrar una nueva subsede</span>
        </a>
    </div>
    @endif
    @endauth
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Dirección</th>
                <th scope="col">Tipo</th>
                <th scope="col" style="text-align: center;">Opciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($sedes as $sede)
            <tr>
                <td scope="row">{{ $sede->nombre }}</td>
                <td scope="row">{{ $sede->direccion }}</td>
                <td scope="col">Sede</td>
                <td style="text-align: center;">
                    <a class="btn btn-primary btn-sm" href="{{ route('sedes.edit', $sede)}}">
                        <i class="fas fa-eye"></i>
                    </a>
                </td>
            </tr>
            @endforeach
            @foreach($subsedes as $subsede)
            <tr>
                <td scope="row">{{ $subsede->nombre }}</td>
                <td scope="row">{{ $subsede->direccion }}</td>
                <td scope="col">Subede</td>
                <td style="text-align: center;">
                    <a class="btn btn-primary btn-sm" href="{{ route('subsedes.edit', $subsede)}}">
                        <i class="fas fa-eye"></i>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
{{$sedes->appends(Request::except('_token', '_method'))->links()}}
</div>
@endsection