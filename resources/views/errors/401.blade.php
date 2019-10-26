@extends('layouts.dashboard')

@section('contenido')
<div class="main-contenido">
    <div class="unauthorized">
        <img src="{{asset('images/unauthorized.png')}}">
        <h1>No tienes permisos para realizar esta acción.</h1>
    </div>
</div>
@endsection