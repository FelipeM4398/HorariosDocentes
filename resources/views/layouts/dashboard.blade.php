@extends('layouts.app')

@section('content')
<div class="main-container">

    <div class="navbar-left">
        <div class="header-navbar">
            Horario Docente
        </div>
        <div class="user-container">
            <div class="avatar"></div>
            <div class="name-user">{{Auth::user()->nombres}} {{Auth::user()->apellidos}}</div>
            @if(!(Auth::user()->tipoUsuario()->first() == null))
            <div class="role-user">{{Auth::user()->tipoUsuario()->first()->nombre}}</div>
            @else
            <div class="role-user">Usuario</div>
            @endif
        </div>
        <div class="menu">
            <div class="item"><a class="{{Request::is('home') ? 'active' : ''}}" href="{{route('home')}}">Inicio</a></div>
            <div class="item"><a href="#">Usuarios</a></div>
            <div class="item"><a href="#">Facultades</a></div>
            <div class="item"><a href="#">Programas</a></div>
            <div class="item"><a href="#">Horarios</a></div>
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
        @yield('contenido')
    </div>
</div>
@endsection

@section('scripts')
@yield('scripts')
@endsection