@extends('layouts.app')

@section('content')
<div class="main-container">

    <div class="navbar-left">
        <div class="header-navbar">
            Horario Docente
        </div>
        <div class="user-container">
            <div class="avatar"></div>

            @auth
            <div class="name-user">{{Auth::user()->nombres}} {{Auth::user()->apellidos}}</div>

            @if(Auth::user()->tipoUsuario()->count() != 0)
            <div class="role-user">{{Auth::user()->tipoUsuario()->first()->nombre}}</div>
            @else
            <div class="role-user">Sin rol</div>
            @endif
            @endauth

            @guest
            <div class="role-user">Usuario</div>
            @endguest
        </div>
        <div class="menu">
            <div class="item"><a class="{{(Request::is('home') || Request::is('/')) ? 'active' : ''}}" href="{{route('home')}}">Inicio</a></div>

            @if(Auth::user()->hasAnyRole(['Administrador']))
            <div class="item"><a class="{{Request::is('usuarios*') ? 'active' : ''}}" href="{{route('usuarios.index')}}">Usuarios</a></div>
            @endif

            @if(Auth::user()->hasAnyRole(['Docente']))
            <div class="item"><a class="{{(Request::is('disponibilidad*') || Request::is('usuarios/periodos*')) ? 'active' : ''}}" href="{{route('disponibilidad.index')}}">Disponibilidad</a></div>

            <div class="item">
                <a class="{{Request::is('usuarios/asignaturas*') ? 'active' : ''}}" href="{{route('usuarios.asignaturas', Auth::user())}}">Mis asignaturas</a></div>
            @endif

            @if(Auth::user()->hasRole('Docente'))
            <div class="item"><a class="{{(Request::is('disponibilidad*') || Request::is('usuarios/periodos*')) ? 'active' : ''}}" href="{{route('disponibilidad.index')}}">Disponibilidad</a></div>
            @endif

            <div class="item"><a href="#">Facultades</a></div>

            <div class="item"><a class="{{Request::is('programas*') ? 'active' : ''}}" href="{{route('programas.index')}}">Programas</a></div>

            <div class="item"><a class="{{Request::is('horarios*') ? 'active' : ''}}" href="{{route('horarios.index')}}">Horarios</a></div>
            <div class="item"><a href="#">Grupos</a></div>

            <div class="item"><a class="{{Request::is('asignaturas*') ? 'active' : ''}}" href="{{route('asignaturas.index')}}">Asignaturas</a></div>
            <div class="item"><a href="#">Salones</a></div>
        </div>
        <div class="logout">
            <span class="top"></span>
            <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                <i class="fas fa-sign-out-alt"></i>
                {{ __('Salir') }}
            </a>
            <span class="bottom"></span>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
    </div>
    <div class="content">
        <div class="navbar-horizontal">

            @if(Auth::user()->hasAnyRole(['Administrador']))
            <div>
                <div class="item" data-toggle="dropdown"><i class="fas fa-cog"></i></div>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="#">Opciones de administrador</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{route('periodos.index')}}"><i class="far fa-calendar"></i> Periodos académicos</a>
                    <!-- <a class="dropdown-item" href="{{route('jornadas.index')}}"><i class="fas fa-clock"></i> Jornadas</a> -->
                    <a class="dropdown-item" href="#"><i class="fas fa-university"></i> Sedes</a>
                </div>
            </div>
            @endif

            <div class="item"><i class="fas fa-bell"></i><span class="badge badge-notify">9</span></div>

            <div>
                <div class="item" data-toggle="dropdown"><i class="fas fa-user-circle"></i></div>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="#">{{Auth::user()->nombres}} {{Auth::user()->apellidos}}</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ route('informacion.index') }}"><i class="far fa-address-card"></i> Mi información</a>
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                        <i class="fas fa-sign-out-alt"></i>
                        {{ __('Salir') }}</a>
                </div>
            </div>
        </div>
        <div class="contenido">
            @yield('contenido')
        </div>
    </div>
</div>
@endsection

@section('scripts')
@yield('scripts')
@endsection