@extends('layouts.dashboard')

@section('contenido')

<div class="title-contenido">
    <h2>Bienvenido a</h2>
    <h1>Horario Docente</h1>
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
</div>
@endsection