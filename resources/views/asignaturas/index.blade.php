@extends('layouts.dashboard')

@section('contenido')
<div class="container">
    <div class="row">
        <div class="mt-4">
            <a href="{{ route('asignaturas.create') }}" class="btn btn-block btn-info mb-3 text-white">Crear</a>
            <table class="table table-hover table-ligth">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">C&oacute;digo</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Cr&eacute;ditos</th>
                        <th scope="col">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($asignaturas as $asignatura)
                    <tr>
                        <th scope="row">{{ $asignatura->id }}</th>
                        <td>{{ $asignatura->codigo }}</td>
                        <td>{{ $asignatura->nombre }}</td>
                        <td>{{ $asignatura->creditos }}</td>
                        <td>
                            <a href="{{route('asignaturas.edit', $asignatura)}}" class="btn btn-success">Editar</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{$asignaturas->links()}}
        </div>
    </div>
</div>
@stop