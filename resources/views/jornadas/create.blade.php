@extends('layouts.dashboard')

@section('contenido')
<div class="container">
    <div class="row">
        <div class="mt-4">

            <form method="post" action="{{route('jornadas.store')}}">
                @csrf
                <div class="form-group">
                    <label for="formGroupNombreInput">Hora inicio</label>
                    <input type="time" class="form-control" id="formGroupNombreInput" name="hora_inicio" >
                </div>
                <div class="form-group">
                    <label for="formGroupCreditosInput">Hora fin</label>
                    <input type="time"  class="form-control" id="formGroupCreditosInput" name="hora_fin" >
                </div>
                <button type="submit" class="btn btn-success">
                    crear
                </button>
            </form>
        </div>
    </div>
</div>
@endsection