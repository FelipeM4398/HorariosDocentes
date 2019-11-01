@extends('layouts.dashboard')

@section('contenido')
<div class="title-contenido">
    <h2>Asignar</h2>
    <h1>Días</h1>
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
    <form method="POST" action="{{route('horarios.store')}}">
        @csrf
        <span style="display: block; margin-bottom: 1rem;">Todos los campos son obligatorios.</span>
        <div class="form-group buttons">
            <button class="btn btn-success btn-sm" type="button"><i class="fas fa-plus-circle"></i> Agregar día</button>
        </div>
        <div class="form-group group-inputs-3">
            <div>
                <label>Día</label>
                <select name="dias[]" class="form-control" required>
                    <option value="">Seleccione un día</option>
                    @foreach($dias as $dia)
                    <option value="{{$dia->id}}">
                        {{$dia->nombre}}
                    </option>
                    @endforeach
                </select>
            </div>
            <div>
                <label>Frecuencia</label>
                <select name="frecuencias[]" class="form-control" required>
                    <option value="">Seleccione una frecuencia</option>
                    @foreach($frecuencias as $frecuencia)
                    <option value="{{$frecuencia->id}}">
                        {{$frecuencia->nombre}}
                    </option>
                    @endforeach
                </select>
            </div>
            <div>
                <label>Cantidad de horas</label>
                <input name="cantidad[]" step="any" class="form-control" type="number" placeholder="Ingrese la cantidad de horas" required>
            </div>
            <div>
                <label>Hora de inicio</label>
                <input type="time" name="hora[]" class="form-control" placeholder="Ingrese la hora de inicio" value="07:00" min="07:00" max="21:30" required>
            </div>
        </div>
    </form>
</div>
@endsection