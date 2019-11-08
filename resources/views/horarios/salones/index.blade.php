@extends('layouts.dashboard')

@section('contenido')
<div class="title-contenido">
    <h2>Seleccionar</h2>
    <h1>Horario académico</h1>
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

    <div class="filtros">
        <form method="POST" action="{{ route('horarios_salones.index') }}">
            @method('GET')
            @csrf
            <div class="form-group group-inputs-3">
                <div>
                    <label for="periodo">{{__('Periodo')}}</label>
                    <select name="periodo" class="form-control">
                        <option value="">Seleccione el periodo</option>
                        @foreach($periodos as $periodo)
                        <option value="{{$periodo->id}}" @if(old('periodo')==$periodo->id)
                            selected
                            @endif>
                            Periodo
                            {{$periodo->año}}-0{{$periodo->periodo}}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="dia">{{__('Día')}}</label>
                    <select name="dia" class="form-control">
                        <option value="">Seleccione el día</option>
                        @foreach($dias as $dia)
                        <option value="{{$dia->id}}" @if(old('dia')==$dia->id)
                            selected
                            @endif>
                            {{$dia->nombre}}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="hora">{{__('Hora de inicio')}}</label>
                    <input type="time" name="hora" value="{{ old('hora') }}" class="form-control">
                </div>
            </div>
            <div class="form-check">
                <input type="checkbox" value="true" name="asignar" class="form-check-input" id="exampleCheck1"
                    {{ old('asignar') ? 'checked' : ''}}>
                <label class="form-check-label" for="exampleCheck1">Sin asignar</label>
            </div>
            <div class="buttons">
                <button type="submit" class="btn btn-primary">
                    {{ __('Aplicar') }}
                </button>
            </div>
        </form>
    </div>

    <div class="table-responsive">

        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">Periodo</th>
                    <th scope="col">Código</th>
                    <th scope="col">Asignatura</th>
                    <th scope="col">Día</th>
                    <th scope="col">Hora inicio</th>
                    <th scope="col">Hora fin</th>
                    <th scope="col">Sede</th>
                    <th scope="col">Salón</th>
                    <th scope="col" style="text-align: center;">Editar</th>
                </tr>
            </thead>
            <tbody>
                @if($horarios->count() == 0)
                <tr>
                    <td colspan="4">No se encuentraron horarios registrados</td>
                </tr>
                @else
                @foreach($horarios as $horario)
                <tr>
                    <td>
                        {{$horario->horarioDetalle->periodo->año}} - {{$horario->horarioDetalle->periodo->periodo}}
                    </td>
                    <td>
                        {{$horario->horarioDetalle->asignatura->codigo}}
                    </td>
                    <td>
                        {{$horario->horarioDetalle->asignatura->nombre}}
                    </td>
                    <td>
                        {{$horario->dia->nombre}}
                    </td>
                    <td>
                        {{$horario->horaInicio()}}
                    </td>
                    <td>
                        {{$horario->horaFin()}}
                    </td>
                    <td>
                        @if ($horario->salon)
                        @if ($horario->salon->subsede)
                        {{$horario->salon->sede->nombre}} -
                        {{$horario->salon->subsede->nombre}}
                        @else
                        {{$horario->salon->sede->nombre}}
                        @endif
                        @else
                        Sin asignar
                        @endif
                    </td>
                    <td>
                        {{ ($horario->salon) ? $horario->salon->nombre : 'Sin asignar'}}
                    </td>
                    <td style="text-align: center;">
                        <a class="btn btn-primary btn-sm" href="{{route('horarios_salones.edit', $horario)}}">
                            <i class="fas fa-pen"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
                @endif
            </tbody>
        </table>
        {{$horarios->appends(Request::except('_token', '_method'))->links()}}
    </div>
</div>

@endsection