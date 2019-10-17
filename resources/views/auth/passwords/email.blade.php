@extends('layouts.login-layout')

@section('content-login')
<div class="form-left-container">
    <h2 class="form-subtitle">Restablecer</h2>
    <h1 class="form-title">Contraseña</h1>
    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif
    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <div class="form-group">
            <label for="email">{{ __('Correo') }}</label>
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Ingresa tu correo electrónico">
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror

        </div>
        <div class="form-group buttons-login">
            <a class="btn-link registrarse" href="{{ route('login') }}">{{ __('Volver al login') }}</a>
            <button type="submit" class="btn btn-primary">
                {{ __('Enviar enlace') }}
            </button>
        </div>
    </form>
</div>
@endsection