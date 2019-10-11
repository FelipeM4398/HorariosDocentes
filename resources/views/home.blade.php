@extends('layouts.dashboard')

@section('contenido')
<div class="container">
    @if (session('status'))
    <div class="alert alert-succes alert-dismissible fade show" role="alert">
        {{ session('status') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    <h1 style="text-align: center">Bienvenido(a), {{Auth::user()->nombres}} {{Auth::user()->apellidos}}</h1>
</div>
@endsection