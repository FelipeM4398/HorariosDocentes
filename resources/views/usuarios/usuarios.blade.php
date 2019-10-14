@extends('layouts.dashboard')

@section('contenido')
<div class="title-contenido">
    <h2>Ver</h2>
    <h1>Usuarios</h1>
</div>
<div class="content-users">
    <div class="filtros">
        <form method="POST" action="{{ route('usuarios.index') }}">
            @method('GET')
            @csrf
            <div class="form-group">
                <div class="title-filtro">{{ __('Filtros') }}</div>
                <div class="group-inputs-3">
                    <input id="identificacion" type="number" class="form-control" name="identificacion" placeholder="Buscar por identificación" value="{{ old('identificacion') }}">
                    <input id="nombre" type="text" class="form-control" name="nombre" placeholder="Buscar por nombre" value="{{ old('nombre') }}" autocomplete="off">
                    <input id="apellido" type="text" class="form-control" name="apellido" placeholder="Buscar por apellido" value="{{ old('apellido') }}" autocomplete="off">
                </div>
            </div>
            <label style="padding-left: 15px;">Buscar por rol:</label>
            <div class="form-group roles">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="rol" id="decano" value="2" @if(old('rol')==2) checked @endif>
                    <label class="form-check-label" for="decano">
                        Decano
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="rol" id="director" value="3" @if(old('rol')==3) checked @endif>
                    <label class="form-check-label" for="director">
                        Director
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="rol" id="docente" value="4" @if(old('rol')==4) checked @endif>
                    <label class="form-check-label" for="docente">
                        Docente
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="rol" id="coordinador" value="5" @if(old('rol')==5) checked @endif>
                    <label class="form-check-label" for="coordinador">
                        Coordinador
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="rol" id="sin" value="6" @if(old('rol')==6) checked @endif>
                    <label class="form-check-label" for="sin">
                        Sin asignar
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="rol" id="todos" value="" @if(old('rol')=='' ) checked @endif>
                    <label class="form-check-label" for="todos">
                        Todos
                    </label>
                </div>
            </div>
            <div class="form-group buttons">
                <span></span>
                <button type="submit" class="btn btn-primary">
                    {{ __('Aplicar') }}
                </button>
            </div>
        </form>
    </div>
    <div class="users">
        <table class="table table-hover table-ligth">
            <thead>
                <tr>
                    <th scope="col">Identificación</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Correo</th>
                    <th scope="col">Rol</th>
                    <th scope="col">Ver más</th>
                </tr>
            </thead>
            <tbody>
                @if($usuarios->count() == 0)
                <tr>
                    <td colspan="4">No se encuentraron usuarios</td>
                </tr>
                @else
                @foreach($usuarios as $usuario)
                <tr>
                    <th scope="row">{{ $usuario->identificacion }}</th>
                    <td>{{ $usuario->nombres }} {{ $usuario->apellidos }}</td>
                    <td>{{ $usuario->email }} </td>
                    <td>
                        @if($usuario->tipoUsuario()->count() == 0)
                        Sin asignar
                        @else
                        {{ $usuario->tipoUsuario()->first()->nombre}}
                        @endif
                    </td>
                    <td style="text-align: center;"><a class="btn btn-primary btn-sm" href="{{ route('usuarios.show', $usuario)}}"><i class="fas fa-eye"></i></a></td>
                </tr>
                @endforeach
                @endif
            </tbody>
        </table>
        {{$usuarios->links()}}
    </div>
</div>
@endsection