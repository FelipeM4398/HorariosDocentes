@extends('layouts.dashboard')

@section('contenido')
<div class="title-contenido">
    <h2>Bienvenido a</h2>
    <h1>Horario Docente</h1>
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

    <div class="group-inputs-3">
        <div class="block block-yellow">
            <div class="block-icon">
                <i class="fas fa-chalkboard-teacher"></i>
            </div>
            <div class="block-text">
                <h3>Número de</h3>
                <h2>Docentes</h2>
                <a style="font-size: 1.2rem" class="btn-link text-white" href="#">
                    {{ $usuarios->where('id_tipo_usuario', 4)->count() }}
                </a>
            </div>
        </div>
        <div class="block block-yellow">
            <div class="block-icon">
                <i class="fas fa-chalkboard-teacher"></i>
            </div>
            <div class="block-text">
                <h3>Número de</h3>
                <h2>Decanos</h2>
                <a style="font-size: 1.2rem" class="btn-link text-white" href="#">
                    {{ $usuarios->where('id_tipo_usuario', 2)->count() }}
                </a>
            </div>
        </div>
        <div class="block block-yellow">
            <div class="block-icon">
                <i class="fas fa-chalkboard-teacher"></i>
            </div>
            <div class="block-text">
                <h3>Número de</h3>
                <h2>Directores</h2>
                <a style="font-size: 1.2rem" class="btn-link text-white" href="#">
                    {{ $usuarios->where('id_tipo_usuario', 3)->count() }}
                </a>
            </div>
        </div>
    </div>

    <hr>

    <div class="group-inputs-3">
        <div class="block block-blue">
            <div class="block-icon">
                <i class="fas fa-university"></i>
            </div>
            <div class="block-text">
                <h3>Número de</h3>
                <h2>Programas</h2>
                <a style="font-size: 1.2rem" class="btn-link text-white" href="#">
                    {{ $programas->count() }}
                </a>
            </div>
        </div>
        <div class="block block-blue">
            <div class="block-icon">
                <i class="fas fa-university"></i>
            </div>
            <div class="block-text">
                <h3>Número de</h3>
                <h2>Facultades</h2>
                <a style="font-size: 1.2rem" class="btn-link text-white" href="#">
                    {{ $facultades->count() }}
                </a>
            </div>
        </div>
        <div class="block block-blue">
            <div class="block-icon">
                <i class="fas fa-clipboard"></i>
            </div>
            <div class="block-text">
                <h3>Número de</h3>
                <h2>Asignaturas</h2>
                <a style="font-size: 1.2rem" class="btn-link text-white" href="#">
                    {{ $asignaturas->count() }}
                </a>
            </div>
        </div>
    </div>

    <hr>

    <div class="group-inputs-2">
        <div class="block block-green">
            <div class="block-icon">
                <i class="fas fa-university"></i>
            </div>
            <div class="block-text">
                <h3>Número de salones</h3>
                <h2>Sede Norte</h2>
                <a style="font-size: 1.2rem" class="btn-link text-white" href="#">
                    {{ $salones->where('id_sede', 1)->count() }}
                </a>
            </div>
        </div>
        <div class="block block-green">
            <div class="block-icon">
                <i class="fas fa-university"></i>
            </div>
            <div class="block-text">
                <h3>Número de salones</h3>
                <h2>Sede sur</h2>
                <a style="font-size: 1.2rem" class="btn-link text-white" href="#">
                    {{ $salones->where('id_sede', 2)->count() }}
                </a>
            </div>
        </div>
    </div>

    <div class="form-group group-inputs-3">
        <div class="block block-green">
            <div class="block-icon">
                <i class="fas fa-university"></i>
            </div>
            <div class="block-text">
                <h3>Número de salones</h3>
                <h2>Sede Norte - Casa Parque</h2>
                <a style="font-size: 1.2rem" class="btn-link text-white" href="#">
                    {{ $salones->where('id_subsede', 1)->count() }}
                </a>
            </div>
        </div>
        <div class="block block-green">
            <div class="block-icon">
                <i class="fas fa-university"></i>
            </div>
            <div class="block-text">
                <h3>Número de salones</h3>
                <h2>Sede Norte - Estación 1</h2>
                <a style="font-size: 1.2rem" class="btn-link text-white" href="#">
                    {{ $salones->where('id_subsede', 2)->count() }}
                </a>
            </div>
        </div>
        <div class="block block-green">
            <div class="block-icon">
                <i class="fas fa-university"></i>
            </div>
            <div class="block-text">
                <h3>Número de salones</h3>
                <h2>Sede Norte - Estación 2</h2>
                <a style="font-size: 1.2rem" class="btn-link text-white" href="#">
                    {{ $salones->where('id_subsede', 3)->count() }}
                </a>
            </div>
        </div>
    </div>

</div>
@endsection