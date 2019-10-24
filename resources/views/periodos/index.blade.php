@extends('layouts.dashboard')

@section('contenido')
<div class="title-contenido">
    <h2>Periodos</h2>
    <h1>Académicos</h1>
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
        <form method="POST" action="{{ route('periodos.index') }}">
            @method('GET')
            @csrf
            <div class="title-filtro">{{ __('Filtros') }}</div>
            <div class="group-inputs-2">
                <div class="form-group" style="margin-right: 2rem;">
                    <label for="año">Año</label>
                    <input type="number" class="form-control" name="año" placeholder="Buscar por año" value="{{ old('año') }}">
                </div>
                <div class="form-group checks">
                    <label>Periodo</label>
                    <div class="group-inputs-3">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="periodo" id="1" value="1" @if(old('periodo')==1) checked @endif>
                            <label class="form-check-label" for="1">
                                Periodo 1
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="periodo" id="2" value="2" @if(old('periodo')==2) checked @endif>
                            <label class="form-check-label" for="2">
                                Periodo 2
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="periodo" id="3" value="3" @if(old('periodo')==3) checked @endif>
                            <label class="form-check-label" for="3">
                                Todos
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="buttons">
                <span></span>
                <button type="submit" class="btn btn-primary">
                    {{ __('Aplicar') }}
                </button>
            </div>
        </form>
    </div>

    <div class="table-responsive">
        <div class="action">
            <a href="{{ route('periodos.create') }}" title="Nueva asignatura">
                <span class="icon text-success">
                    <i class="fas fa-plus-circle"></i>
                </span>
                <span class="text-dark">Registrar nuevo periodo</span>
            </a>
        </div>

        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Año</th>
                    <th scope="col" style="text-align: center;">Periodo</th>
                    <th scope="col" style="text-align: center;">Opciones</th>
                </tr>
            </thead>
            <tbody>
                @if($periodos->count() == 0)
                <tr>
                    <td colspan="3">No se encontró ningun periodo registrado</td>
                </tr>
                @else
                @foreach($periodos as $periodo)
                <tr>
                    <td scope="row">{{ $periodo->id }}</td>
                    <td scope="row">{{ $periodo->año }}</td>
                    <td scope="row" style="text-align: center;">{{ $periodo->periodo }}</td>
                    <td style="text-align: center;">
                        <a class="btn btn-primary btn-sm" href="{{ route('periodos.edit', $periodo) }}">
                            <i class="fas fa-eye"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
                @endif
            </tbody>
        </table>
    </div>
    {{$periodos->links()}}
</div>
@stop