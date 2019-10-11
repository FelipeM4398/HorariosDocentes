@extends('layouts.app')

@section('content')
<div class="container">
    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif

    <h1 style="text-align: center">Bienvenido(a), {{ Auth::user()->nombres }}</h1>
    @if(Auth::user()->id_tipo_usuario == 1)
    <h2 style="text-align: center">Eres un administrador</h2>
    @endif
    @if(Auth::user()->id_tipo_usuario == 4)
    <h2 style="text-align: center">Eres un docente</h2>
    @endif
    @if(Auth::user()->id_tipo_usuario == null)
    <h2 style="text-align: center">Espera a que te asignen un rol</h2>
    @endif

        <div class="row">
            <div class="col-4">
                <div class="list-group" id="list-tab" role="tablist">
                    <a class="list-group-item list-group-item-action active" id="list-asignaturas-list" data-toggle="list" href="#list-asignaturas" role="tab" aria-controls="home">Asignaturas</a>
                    <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="#list-profile" role="tab" aria-controls="profile">Profile</a>
                    <a class="list-group-item list-group-item-action" id="list-messages-list" data-toggle="list" href="#list-messages" role="tab" aria-controls="messages">Messages</a>
                    <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="#list-settings" role="tab" aria-controls="settings">Settings</a>
                </div>
            </div>
            <div class="col-8">
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="list-asignaturas" role="tabpanel" aria-labelledby="list-asignaturas-list">
                        <ul class="list-group">
                            <li class="list-group-item">
                                <a href="{{route('asignaturas.index')}}">Listar</a>
                            </li>
                            <li class="list-group-item">
                                <a href="">Crear</a>
                            </li>
                            <li class="list-group-item">
                                <a href="">Editar</a>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">2</div>
                    <div class="tab-pane fade" id="list-messages" role="tabpanel" aria-labelledby="list-messages-list">3</div>
                    <div class="tab-pane fade" id="list-settings" role="tabpanel" aria-labelledby="list-settings-list">4</div>
                </div>
            </div>
        </div>

</div>
@endsection
