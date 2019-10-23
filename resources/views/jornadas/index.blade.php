@extends('layouts.dashboard')

@section('contenido')
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <a href="{{ route('jornadas.create') }}" class="btn btn-block btn-info mb-3 text-white">Crear</a>
                <div class="table-responsive">
                    <table class="table table-hover table-dark">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Hora inicio</th>
                            <th scope="col">Hora fin</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($jornadas as $jornada)
                            <tr>
                                <th scope="row">{{ $jornada->id }}</th>
                                <th scope="row">{{ $jornada->hora_inicio }}</th>
                                <th scope="row">{{ $jornada->hora_fin }}</th>
                                <td>
                                    <a href="{{ route('jornadas.edit', $jornada) }}" class="btn btn-success">Editar</a>
                                </td>
                                <td>
                                    <a href="{{ route('jornadas.destroy', $jornada) }}" class="btn btn-success">Borrar</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                {{$jornadas->links()}}
            </div>
        </div>
    </div>
@stop
