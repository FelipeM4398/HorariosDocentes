@extends('layouts.dashboard')

@section('contenido')
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <a href="{{ route('periodos.create') }}" class="btn btn-block btn-info mb-3 text-white">Crear</a>
                <div class="table-responsive">
                    <table class="table table-hover table-dark">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Año</th>
                            <th scope="col">Periodo</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($periodos as $periodo)
                            <tr>
                                <th scope="row">{{ $periodo->id }}</th>
                                <th scope="row">{{ $periodo->año }}</th>
                                <th scope="row">{{ $periodo->periodo }}</th>
                                <td>
                                    <a href="{{ route('periodos.edit', $periodo) }}" class="btn btn-success">Editar</a>
                                </td>
                                <td>
                                    <a href="{{ route('periodos.destroy', $periodo) }}" class="btn btn-success">Borrar</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                {{$periodos->links()}}
            </div>
        </div>
    </div>
@stop
