@extends('layouts.dashboard')

@section('contenido')
    <div class="container">
        <div class="row">
            <div class="mt-4">
                <a href="{{ route('programas.create') }}" class="btn btn-block btn-info mb-3 text-white">Crear</a>
                <div class="table-responsive">
                    <table class="table table-hover table-dark">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">C&oacute;digo</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Descripci&oacute;n</th>
                            <th scope="col">Duraci&oacute;n</th>
                            <th scope="col">Director</th>
                            <th scope="col">Modalidad</th>
                            <th scope="col">Facultad</th>
                            <th scope="col">Tipo de programa</th>
                            <th scope="col">Opciones</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($programas as $programa)
                            <tr>
                                <th scope="row">{{ $programa->id }}</th>
                                <th scope="row">{{ $programa->snies }}</th>
                                <th scope="row">{{ $programa->nombre }}</th>
                                <th scope="row">{{ $programa->descripcion }}</th>
                                <th scope="row">{{ $programa->duracion }}</th>
                                <th scope="row">{{ ($programa->director) ? $programa->director->nombres : 'N/A' }}</th>
                                <th scope="row">{{ $programa->modalidad->nombre }}</th>
                                <th scope="row">{{ $programa->facultad->nombre }}</th>
                                <th scope="row">{{ $programa->tipoPrograma->nombre }}</th>

                                <td>
                                    <a href="{{ route('programas.edit', $programa) }}" class="btn btn-success">Editar</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                {{$programas->links()}}
            </div>
        </div>
    </div>
@stop
