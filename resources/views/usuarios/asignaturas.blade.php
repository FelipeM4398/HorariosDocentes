@extends('layouts.dashboard')

@section('contenido')
<div class="title-contenido">
    <h2>Mis</h2>
    <h1>Asignaturas</h1>
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

    <div class="table-responsive">

        <div class="action">
            <a href="{{ route('usuarios.selectAsignaturas') }}" title="Más asignaturas">
                <span class="icon text-success">
                    <i class="fas fa-plus-circle"></i>
                </span>
                <span class="text-dark">Añadir asignaturas</span>
            </a>
        </div>
        <table class="table table-hover table-ligth">
            <thead>
                <tr>
                    <th scope="col">C&oacute;digo</th>
                    <th scope="col">Nombre</th>
                    <th scope="col" style="text-align: center;">Opciones</th>
                </tr>
            </thead>
            <tbody>
                @if(Auth::user()->asignaturas()->count() != 0)
                @foreach($asignaturas as $asignatura)
                <tr>
                    <td>{{ $asignatura->codigo }}</td>
                    <td>{{ $asignatura->nombre }}</td>
                    <td style="text-align: center;">
                        <a class="btn btn-danger btn-sm" href="{{route('usuarios.eliminar', $asignatura)}}">
                            <i class="fas fa-minus-circle"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
                @else
                <tr>
                    <td colspan="3">No se encuentran asignaturas registradas</td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
    {{$asignaturas->appends(Request::except('_token', '_method'))->links()}}
</div>
@endsection