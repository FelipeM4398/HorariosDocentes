@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="mt-4">

                <form method="post" action="{{route('asignaturas.update', $asignatura)}}">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label for="formGroupcodigoInput">C&oacute;digo</label>
                        <input type="text" class="form-control" id="formGroupcodigoInput" name="codigo" placeholder="C&oacute;digo" value="{{$asignatura->codigo}}">
                    </div>
                    <div class="form-group">
                        <label for="formGroupNombreInput">Nombre</label>
                        <input type="text" class="form-control" id="formGroupNombreInput" name="nombre" placeholder="Nombre" value="{{$asignatura->nombre}}">
                    </div><div class="form-group">
                        <label for="formGroupCreditosInput">Cr&eacute;ditos</label>
                        <input type="number" step="1" class="form-control" id="formGroupCreditosInput" name="creditos" placeholder="Cr&eacute;ditos" value="{{$asignatura->creditos}}">
                    </div>
                    <button type="submit" class="btn btn-success">
                        actualizar
                    </button>
                </form>
            </div>
        </div>
    </div>
@stop
