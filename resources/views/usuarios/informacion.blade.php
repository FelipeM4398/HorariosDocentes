@extends('layouts.dashboard')

@section('contenido')
<div class="title-contenido">
    <h2>Mi</h2>
    <h1>Información</h1>
</div>
<div class="main-contenido informacion">
    <div class="info-user">
        @if (session('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('status') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        <form method="POST" action="{{ route('informacion.update', $informacion) }}">
            <form>
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="identificacion">{{ __('Identificación') }}</label>
                    <input id="identificacion" type="number" class="form-control @error('identificacion') is-invalid @enderror" name="identificacion" value="{{ $informacion->identificacion }}" required placeholder="Ingrese su número de indentificación" disabled="true">
                    @error('identificacion')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="nombres">{{ __('Nombres y apellidos') }}</label>
                    <div class="group-inputs-2">
                        <input id="nombres" type="text" class="form-control nombres @error('nombres') is-invalid @enderror" name="nombres" value="{{ $informacion->nombres }}" required placeholder="Ingrese sus nombres" disabled="true">

                        <input id="apellidos" type="text" class="form-control nombres @error('apellidos') is-invalid @enderror" name="apellidos" value="{{ $informacion->apellidos }}" required placeholder="Ingrese sus apellidos" disabled="true">
                    </div>

                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="telefono">{{ __('Teléfono') }}</label>
                    <input id="telefono" type="number" class="form-control @error('telefono') is-invalid @enderror" name="telefono" value="{{ $informacion->telefono }}" required placeholder="Ingrese su número de teléfono (Fijo o celular)" disabled="true">
                    @error('telefono')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="email">{{ __('Correo') }}</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $informacion->email }}" required autocomplete="email" placeholder="Ingrese su correo electrónico" disabled="true">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                @if(Auth::user()->hasRole('Docente'))
                <div class="form-group">
                    <label for="contrato">{{__('Tipo de contrato')}}</label>
                    <select name="contrato" id="contrato" class="form-control" disabled="true">
                        <option value="">Seleccione un tipo de contrato</option>
                        @foreach($contratos as $contrato)
                        <option value="{{$contrato->id}}">{{$contrato->nombre}}</option>
                        @endforeach
                        @if($informacion->id_tipo_contrato)
                        <option value="{{$informacion->id_tipo_contrato}}" selected>{{$informacion->tipoContrato()->first()->nombre}}</option>
                        @endif
                    </select>
                </div>
                @endif

                <div class="form-group buttons">
                    <button id="editar" type="button" class="btn btn-primary">
                        {{ __('Editar') }}
                    </button>
                    <button id="cancelar" type="button" class="btn btn-danger hidden">
                        {{ __('Cancelar') }}
                    </button>
                    <button id="cambios" type="submit" class="btn btn-success hidden">
                        {{ __('Guardar cambios') }}
                    </button>
                </div>
            </form>
    </div>
    <div class="info-rol">
        <div class="block block-blue">
            <div class="block-icon">
                <i class="fas fa-lock"></i>
            </div>
            <div class="block-text">
                <div>
                    <h3>Cambiar</h3>
                    <h2>Contraseña</h2>
                    <a class="btn-link text-white" href="{{ route('password.request') }}">
                        {{ __('¡Para cambiar su contraseña haz click aquí!') }}
                    </a>
                </div>
            </div>
        </div>
        @if(Auth::user()->id_tipo_usuario == 4)
        <div class="block block-green">
            <div class="block-icon">
                <i class="fas fa-calendar-check"></i>
            </div>
            <div class="block-text">
                <div>
                    <h3>Ver mi</h3>
                    <h2>Disponibilidad</h2>
                    <a class="btn-link text-white" href="{{route('disponibilidad.index')}}">
                        {{ __('¡Para ver su disponibilidad haz click aquí!') }}
                    </a>
                </div>
            </div>
        </div>

        <div class="block block-yellow">
            <div class="block-icon">
                <i class="fas fa-clipboard-list"></i>
            </div>
            <div class="block-text">
                <h3>Ver</h3>
                <h2>Asignaturas</h2>
                <a class="btn-link text-white" href="#">
                    {{ __('¡Para ver las asignaturas que dicta haz click aquí!') }}
                </a>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('js/informacion.js') }}"></script>
@endsection