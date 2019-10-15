@extends('layouts.dashboard')

@section('contenido')
<div class="back">
    <a class="btn btn-link" href="{{route('usuarios.index')}}">
        <i class="fas fa-arrow-left"></i>
        Volver
    </a>
</div>
<div class="title-contenido">
    <h2>Usuario</h2>
    <h1>{{ $usuario->nombres }} {{ $usuario->apellidos }}</h1>
</div>
<div class="user-content">

    @if (session('status'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('status') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    <div class="user-info">
        @if($usuario->tipoUsuario()->count() != 0)
        <span class="role">{{$usuario->tipoUsuario()->first()->nombre}}</span>
        @else
        <a class="btn btn-warning btn-sm asignar" id="asignarRol" href="#">Asignar rol</a>
        @endif

        <span><b>CC.</b> {{$usuario->identificacion}}</span>
        <span><b>Teléfono:</b> {{$usuario->telefono}}</span>
        <span><b>Correo:</b> {{$usuario->email}}</span>

        @if($usuario->hasRole('Docente'))
        @if($usuario->tipoContrato()->count() != 0)
        <span><b>Tipo de contrato:</b> {{$usuario->tipoContrato()->first()->nombre}}</span>
        @else
        <span><b>Tipo de contrato:</b> No ha seleccionado un contrato</span>
        @endif
        <span><b>Disponiblidad:</b> <a class="btn btn-warning btn-sm asignar" href="{{route('disponibilidad.usuario', $usuario)}}">Consultar</a></span>
        <span style="margin-top: 1rem;"><b>Asignaturas que dicta:</b></span>
        @if($usuario->asignaturas()->count() != 0)
        <div class="asignaturas">
            @foreach($usuario->asignaturas()->get() as $asignatura)
            <div class="card-rol card-asig">
                <div class="icon">
                    <i class="fas fa-book"></i>
                </div>
                <div class="text">
                    <h3>{{$asignatura->codigo}}</h3>
                    <h2>{{$asignatura->nombre}}</h2>
                    <a class="btn-link" href="#">
                        {{ __('Ver asignatura') }}
                    </a>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <span class="asignatura">No ha registrado asignaturas</span>
        @endif
        @endif

        @if($usuario->hasRole('Director'))
        <span style="margin-top: 1rem;"><b>Programas académicos:</b></span>
        @if($usuario->programa()->count() != 0)
        <div class="asignaturas">
            @foreach($usuario->programa()->get() as $programa)
            <div class="card-rol card-dispo">
                <div class="icon">
                    <i class="fas fa-book"></i>
                </div>
                <div class="text">
                    <h2>{{$programa->nombre}}</h2>
                    <a class="btn-link" href="#">
                        {{ __('Ver programa') }}
                    </a>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <a class="btn btn-primary btn-sm asignar" href="#">Asignar programas</a>
        @endif
        @endif

        @if($usuario->hasRole('Decano'))
        <span style="margin-top: 1rem;"><b>Facultad:</b></span>
        @if($usuario->facultad()->count() != 0)
        <div class="asignaturas">
            @foreach($usuario->facultad()->get() as $facultad)
            <div class="card-rol">
                <div class="icon">
                    <i class="fas fa-book"></i>
                </div>
                <div class="text">
                    <h2>{{$facultad->nombre}}</h2>
                    <a class="btn-link" href="#">
                        {{ __('Ver facultad') }}
                    </a>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <a class="btn btn-success btn-sm asignar" href="#">Asignar facultad</a>
        @endif
        @endif

        @if($usuario->tipoUsuario()->count() == 0)
        <div class="asignar-rol hidden" id="rolDiv">
            <form method="POST" action="">
                <h3>Asignar rol</h3>
                @method('PUT')
                @csrf
                <label style="padding-left: 5px;">Seleccione un rol:</label>
                <div class="form-group roles">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="rol" id="deca" value="2" checked>
                        <label class="form-check-label" for="deca">
                            Decano
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="rol" id="dire" value="3">
                        <label class="form-check-label" for="dire">
                            Director
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="rol" id="docen" value="4">
                        <label class="form-check-label" for="docen">
                            Docente
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="rol" id="coordi" value="5">
                        <label class="form-check-label" for="coordi">
                            Coordinador
                        </label>
                    </div>
                </div>
                <div class="form-group buttons">
                    <span></span>
                    <button type="submit" class="btn btn-success">
                        {{ __('Asignar') }}
                    </button>
                </div>
            </form>
        </div>
        @endif
    </div>
</div>
@endsection