@extends('layouts.dashboard')

@section('contenido')
<div class="title-contenido">
    <div class="back">
        @guest
        <a class="btn btn-link" href="{{route('usuarios.disponibilidad', $usuario)}}">
            <i class="fas fa-arrow-left"></i>
            Volver
        </a>
        @endguest

        @auth
        @if (Auth::user()->hasAnyRole(['Docente']))
        <a class="btn btn-link" href="{{route('disponibilidad.index')}}">
            <i class="fas fa-arrow-left"></i>
            Volver
        </a>
        @else
        <a class="btn btn-link" href="{{route('usuarios.disponibilidad', $usuario)}}">
            <i class="fas fa-arrow-left"></i>
            Volver
        </a>
        @endif
        @endauth

    </div>

    @auth
    @if(Auth::user()->hasAnyRole(['Docente']))
    <h2>Mi</h2>
    <h1>Disponibilidad</h1>
    @else
    <h2>Usuario</h2>
    <h1>{{$usuario->nombres}} {{$usuario->apellidos}}</h1>
    <h3>Disponibilidad</h3>
    @endif
    @endauth

    @guest
    <h2>Usuario</h2>
    <h1>{{$usuario->nombres}} {{$usuario->apellidos}}</h1>
    <h3>Disponibilidad</h3>
    @endguest

</div>
<div class="main-contenido">
    <div class="table-responsive">
        <h2 class="periodo">Periodo {{$periodo->periodo}} del año {{$periodo->año}}</h2>
        <table class="table table-ligth disponibilidad">
            <thead>
                <tr>
                    <th scope="col">Jornada</th>
                    <th scope="col">Lunes</th>
                    <th scope="col">Martes</th>
                    <th scope="col">Miercoles</th>
                    <th scope="col">Jueves</th>
                    <th scope="col">Viernes</th>
                    <th scope="col">Sábado</th>
                </tr>
            </thead>
            <tbody>
                @if($disponibilidades->count() == 0)
                <tr>
                    <td colspan="4">No se encuentraron disponibilidades</td>
                </tr>
                @else
                @foreach($disponibilidades as $disponibilidad)
                <tr>
                    <th scope="row">
                        @if($disponibilidad->first()->id_jornada == 5)
                        Todo el día
                        @else
                        {{ $disponibilidad->first()->jornada()->first()->hora_inicio }} -
                        {{ $disponibilidad->first()->jornada()->first()->hora_fin }}
                        @endif
                    </th>
                    @foreach($disponibilidad as $jornada)
                    <td>
                        @if($jornada->disponible)
                        <i class="fas fa-check-circle check"></i>
                        @endif
                    </td>
                    @endforeach
                </tr>
                @endforeach
                @endif
            </tbody>
        </table>
    </div>
</div>
@endsection