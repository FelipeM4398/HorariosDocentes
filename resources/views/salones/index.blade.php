@extends('layouts.dashboard')

@section('contenido')
<div class="title-contenido">
    <h2>Ver</h2>
    <h1>Salones</h1>
</div>
<div class="main-contenido">
    <div class="filtros">
        <form method="POST" action="{{ route('salones.index') }}">
            @method('GET')
            @csrf
            <div class="form-group">
                <div class="title-filtro">{{ __('Filtros') }}</div>
                <div class="group-inputs-4">
                    <div>
                        <label for="nombre">Nombre</label>
                        <input id="nombre" type="text" class="form-control" name="nombre"
                            placeholder="Buscar por nombre" value="{{ old('nombre') }}">
                    </div>
                    <div>
                        <label for="capacidad">Capacidad</label>
                        <input id="capacidad" type="text" class="form-control" name="capacidad"
                            placeholder="Buscar por capacidad" value="{{ old('capacidad') }}">
                    </div>
                    <div>
                        <label for="modalidad">Sede</label>
                        <select name="sede" class="form-control">
                            <option value="">Buscar por sede</option>
                            @foreach($sedes as $sede)
                            <option value="{{$sede->id}}" @if(old('sede')==$sede->id) selected @endif>{{$sede->nombre}}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label for="subsede">Subede</label>
                        <select name="subsede" class="form-control">
                            <option value="">Buscar por subsede</option>
                            @foreach($subsedes as $subsede)
                            <option value="{{$subsede->id}}" @if(old('subsede')==$subsede->id) selected
                                @endif>{{$subsede->nombre}}</option>
                            @endforeach
                        </select>
                    </div>
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

        @auth
        @if (Auth::user()->hasAnyRole(['Administrador', 'Coordinacion']))
        <div class="action">
            <a href="{{ route('salones.create') }}" title="Nuevo sal&oacute;n">
                <span class="icon text-success">
                    <i class="fas fa-plus-circle"></i>
                </span>
                <span class="text-dark">Registrar nuevo sal&oacute;n</span>
            </a>
        </div>
        @endif
        @endauth
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Capacidad</th>
                    <th scope="col">Sede</th>
                    <th scope="col">Subsede</th>
                    <th scope="col">Tipo de salon</th>
                    <th scope="col" style="text-align: center;">Ver más</th>
                </tr>
            </thead>
            <tbody>
                @if($salones->count() == 0)
                <tr>
                    <td colspan="4">No se encuentraron salones</td>
                </tr>
                @else
                @foreach($salones as $salon)
                <tr>
                    <td>{{ $salon->nombre }}</td>
                    <td>{{ $salon->capacidad }}</td>
                    <td>{{ $salon->sede->nombre }}</td>
                    <td>{{ ($salon->id_subsede) ? $salon->subsede->nombre : 'N/A' }}</td>
                    <td>{{ $salon->tipoSalon->nombre }}</td>
                    <td style="text-align: center;"><a class="btn btn-primary btn-sm"
                            href="{{ route('salones.show', $salon)}}"><i class="fas fa-eye"></i></a></td>
                </tr>
                @endforeach
                @endif
            </tbody>
        </table>
        {{$salones->appends(Request::except('_token', '_method'))->links()}}
    </div>
</div>
@endsection