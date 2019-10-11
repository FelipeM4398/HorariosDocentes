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
            <div class="role-user">{{$rol->nombre}}</div>
        </div>
        <div class="menu">
            <div class="item"><a href="#"><i class="fas fa-home"></i>Inicio</a></div>
            <div class="item"><a href="#"><i class="fas fa-users"></i>Usuarios</a></div>
            <div class="item"><a href="#"><i class="fas fa-book"></i>Asignaturas</a></div>
            <div class="item"><a href="#"><i class="fas fa-user-friends"></i>Grupos</a></div>

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