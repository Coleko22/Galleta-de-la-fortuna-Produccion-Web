@extends('layouts.app')

@section('titulo', 'Login - Galleta de la Fortuna')

@section('contenido')
<div class="card">
    <span class="cookie">🥠</span>
    <h1>Iniciar sesión</h1>
    <p class="sub">Ingresá para abrir tu galleta</p>

    @if (session('exito'))
        <div class="exito">{{ session('exito') }}</div>
    @endif

    @error('usuario')
        <div class="error">{{ $message }}</div>
    @enderror

    <form action="{{ route('login') }}" method="POST">
        @csrf
        <div class="input-group">
            <label>Usuario</label>
            <input type="text" name="usuario" value="{{ old('usuario') }}" required placeholder="Tu usuario">
        </div>
        <div class="input-group">
            <label>Contraseña</label>
            <input type="password" name="password" required placeholder="••••••••">
        </div>
        <button type="submit" class="btn">Entrar</button>
    </form>

    <span class="link">¿No tenés cuenta? <a href="{{ route('registro') }}">Registrate</a></span>
</div>
@endsection
