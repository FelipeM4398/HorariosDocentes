@extends('layouts.login-layout')

@section('content-login')

<div class="form-left-container">
    <h2 class="form-subtitle">Restablecer</h2>
    <h1 class="form-title">Contraseña</h1>
    <form method="POST" action="{{ route('password.update') }}">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">
        <div class="form-group">
            <label for="email">{{ __('Correo') }}</label>
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email">
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="password">{{ __('Contraseña') }}</label>
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Ingrese su nueva contraseña">
            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="password-confirm">{{ __('Confirmar contraseña') }}</label>
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirme su nueva contraseña">
        </div>

        <div class="form-group buttons">
            <span></span>
            <button type="submit" class="btn btn-primary">
                {{ __('Reestablecer') }}
            </button>
        </div>
    </form>
</div>
@endsection