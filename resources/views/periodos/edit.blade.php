@extends('layouts.dashboard')

@section('contenido')
<div class="container">
    <div class="row">
        <!-- <div class="mt-4"> -->

            <form method="post" action="{{route('periodos.update', $periodo)}}">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="formGroupHoraIni">Año</label>
                    <input type="text" class="form-control" id="formGroupHoraIni" name="año"  value="{{$periodo->año}}">
                </div>
                <div class="form-group">
                    <label for="formGroupHoraFin">Periodo</label>
                    <input type="text" class="form-control" id="formGroupHoraFin" name="periodo"  value="{{$periodo->periodo}}">
                </div>
                <button type="submit" class="btn btn-success">
                    actualizar
                </button>
            </form>
        <!-- </div> -->
    </div>
</div>
@stop