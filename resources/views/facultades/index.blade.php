@extends('layouts.dashboard')

@section('contenido')
<div class="title-contenido">
    <h2>Ver</h2>
    <h1>Facultades</h1>
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
        <form method="POST" action="{{ route('facultades.index') }}">
            @method('GET')
            @csrf
            <div class="title-filtro">{{ __('Filtros') }}</div>
            <div class="group-inputs-2">
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control" name="nombre" placeholder="Buscar por nombre" value="{{ old('nombre') }}" autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="id_decano">Decanos</label>
                    <select class="form-control" name="decano">
                        <option value="" selected>Buscar por decano</option>
                        @foreach($decanos as $decano)
                        <option value="{{$decano->id}}" {{ (old('decano')==$decano->id) ? 'selected' : ''}}>
                            {{$decano->identificacion}} - {{$decano->nombres}} {{$decano->apellidos}}
                        </option>
                        @endforeach
                    </select>
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
    <div class="action">
        <a href="{{ route('facultades.create') }}" title="Nueva facultad">
            <span class="icon text-success">
                <i class="fas fa-plus-circle"></i>
            </span>
            <span class="text-dark">Registrar una nueva facultad</span>
        </a>
    </div>
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Decano</th>
                <th scope="col" style="text-align: center;">Opciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($facultades as $facultad)
            <tr>
                <td scope="row">{{ $facultad->nombre }}</td>
                <td scope="row">{{ ($facultad->decano()->first()) ? $facultad->decano()->first()->nombres.' '.$facultad->decano()->first()->apellidos : 'Sin asignar' }}</td>

                <td style="text-align: center;">
                    <a class="btn btn-primary btn-sm" href="{{ route('facultades.edit', $facultad)}}">
                        <i class="fas fa-eye"></i>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
{{$facultades->appends(Request::except('_token', '_method'))->links()}}
</div>
@endsection