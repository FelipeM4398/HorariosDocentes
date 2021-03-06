@extends('layouts.login-layout')

@section('content-login')
<div class="form-left-container">
    <h2 class="form-subtitle">Bienvenido a</h2>
    <h1 class="form-title">Horario Docente</h1>
    <form class="form-left" method="POST" action="{{ route('login') }}">
        @csrf
        <div class="form-group">
            <label for="identificacion">{{ __('Indentificación') }}</label>
            <input id="identificacion" type="number" class="form-control @error('identificacion') is-invalid @enderror" placeholder="Ingrese su número de identificación" name="identificacion" value="{{ old('identificacion') }}" required>
            @error('identificacion')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="password">{{ __('Contraseña') }}</label>
            <input id="password" type="password" placeholder="Ingrese su contraseña" class="form-control" name="password" required autocomplete="current-password">
        </div>
        <div class="form-group form-buttons">
            <div class="buttons">
                @if (Route::has('password.request'))
                <a class="btn btn-link" href="{{ route('password.request') }}">
                    {{ __('¿Olvidó su contraseña?') }}
                </a>
                @endif
                <button type="submit" class="btn btn-primary">
                    {{ __('Login') }}
                </button>
            </div>
            @if (Route::has('register'))
            <a class="btn btn-link registrarse" href="{{ route('register') }}">{{ __('¿No tienes una cuenta?') }}</a>
            @endif
        </div>
    </form>
</div>
@endsection