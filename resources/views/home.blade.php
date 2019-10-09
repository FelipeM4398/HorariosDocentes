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
</div>
@endsection