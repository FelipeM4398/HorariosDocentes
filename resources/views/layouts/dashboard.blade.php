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
            <div class="role-user">{{Auth::user()->tipoUsuario()->first()->nombre}}</div>
        </div>
        <div class="menu">
            <div class="item"><a href="{{route('home')}}">Inicio</a></div>
            <div class="item"><a href="#">Usuarios</a></div>
            <div class="item"><a href="{{route('asignaturas.index')}}">Asignaturas</a></div>
            <div class="item"><a href="#">Grupos</a></div>
            <div class="item"><a href="#">Programas</a></div>
            <div class="item"><a href="#">Facultades</a></div>

            <div class="item logout">
                <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt"></i>
                    {{ __('Logout') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
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