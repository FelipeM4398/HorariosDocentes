@extends('layouts.dashboard')

@section('contenido')
<div class="container">
    <div class="row">
        <div class="mt-4">

            <form method="post" action="{{route('jornadas.update', $jornada)}}">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="formGroupHoraIni">hora inicio</label>
                    <input type="time" class="form-control" id="formGroupHoraIni" name="hora_inicio"  value="{{$jornada->hora_inicio}}">
                </div>
                <div class="form-group">
                    <label for="formGroupHoraFin">Hora fin</label>
                    <input type="time" class="form-control" id="formGroupHoraFin" name="hora_fin"  value="{{$jornada->hora_fin}}">
                </div>
                <button type="submit" class="btn btn-success">
                    actualizar
                </button>
            </form>
        </div>
    </div>
</div>
@stop