@extends('layouts.dashboard')

@section('contenido')
<div class="container">
    <div class="row">
        <div class="mt-4">

            <form method="post" action="{{route('periodos.store')}}">
                @csrf
                <div class="form-group">
                    <label for="formGroupNombreInput">Año</label>
                    <input type="text" class="form-control" id="formGroupNombreInput" name="año" >
                </div>
                <div class="form-group">
                    <label for="formGroupCreditosInput">Periodo</label>
                    <input type="text"  class="form-control" id="formGroupCreditosInput" name="periodo" >
                </div>
                <button type="submit" class="btn btn-success">
                    crear
                </button>
            </form>
        </div>
    </div>
</div>
@endsection