@extends('layouts.login-layout')

@section('content-login')
<div class="form-left-container">
    <h1 class="form-title">Registrarse</h1>
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="form-group">
            <label for="identificacion">{{ __('Identificación') }}</label>
            <input id="identificacion" type="number" class="form-control @error('identificacion') is-invalid @enderror" name="identificacion" value="{{ old('identificacion') }}" required placeholder="Ingrese su número de indentificación">
            @error('identificacion')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="nombres">{{ __('Nombres y apellidos') }}</label>
            <div class="group-inputs-2">
                <input id="nombres" type="text" class="form-control nombres @error('nombres') is-invalid @enderror" name="nombres" value="{{ old('nombres') }}" required placeholder="Ingrese sus nombres">

                <input id="apellidos" type="text" class="form-control nombres @error('apellidos') is-invalid @enderror" name="apellidos" value="{{ old('apellidos') }}" required placeholder="Ingrese sus apellidos">
            </div>

            @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="telefono">{{ __('Teléfono') }}</label>
            <input id="telefono" type="number" class="form-control @error('telefono') is-invalid @enderror" name="telefono" value="{{ old('telefono') }}" required placeholder="Ingrese su número de teléfono (Fijo o celular)">
            @error('telefono')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="email">{{ __('Correo') }}</label>
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Ingrese su correo electrónico">
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="password">{{ __('Contraseña') }}</label>
            <div class="group-inputs-2">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required placeholder="Ingrese su contraseña">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirme su contraseña">
            </div>
            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div>
            <input type="checkbox" name="isDocente" id="isDocente">
            <label for="isDocente">Docente</label>
            <input type="text" name="docente" class="hidden" id="isdocente" value="false">
        </div>

        <div class="form-group hidden" id="docente">
            <label for="contrato">{{__('Tipo de contrato')}}</label>
            <select name="contrato" id="contrato" class="form-control">
                <option value="">Seleccione un tipo de contrato</option>
                @foreach($contratos as $contrato)
                <option value="{{$contrato->id}}">{{$contrato->nombre}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group buttons">
            <a class="btn btn-link registrarse" href="{{ route('login') }}">{{ __('¿Ya tienes una cuenta?') }}</a>
            <button type="submit" class="btn btn-primary">
                {{ __('Registrarse') }}
            </button>
        </div>
    </form>
</div>
@endsection

@section('scripts')
<script src="{{ asset('js/register.js') }}"></script>
@endsection