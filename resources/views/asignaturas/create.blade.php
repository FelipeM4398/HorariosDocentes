@extends('layouts.dashboard')

@section('contenido')
<div class="container">
    <div class="row">
        <div class="mt-4">

            <form method="post" action="{{route('asignaturas.store')}}">
                @csrf
                <div class="form-group">
                    <label for="formGroupcodigoInput">C&oacute;digo</label>
                    <input type="text" class="form-control" id="formGroupcodigoInput" name="codigo" placeholder="C&oacute;digo">
                </div>
                <div class="form-group">
                    <label for="formGroupNombreInput">Nombre</label>
                    <input type="text" class="form-control" id="formGroupNombreInput" name="nombre" placeholder="Nombre">
                </div>
                <div class="form-group">
                    <label for="formGroupCreditosInput">Cr&eacute;ditos</label>
                    <input type="number" step="1" class="form-control" id="formGroupCreditosInput" name="creditos" placeholder="Cr&eacute;ditos">
                </div>
                <button type="submit" class="btn btn-success">
                    crear
                </button>
            </form>
        </div>
    </div>
</div>
@stop