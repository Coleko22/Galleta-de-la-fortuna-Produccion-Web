@extends('layouts.app')

@section('titulo', 'Registro - Galleta de la Fortuna')

@section('contenido')
<div class="card">
    <span class="cookie">🥠</span>
    <h1>Crear cuenta</h1>
    <p class="sub">Registrate para abrir tu galleta.</p>

    @error('usuario')
        <div class="error">{{ $message }}</div>
    @enderror
    @error('password')
        <div class="error">{{ $message }}</div>
    @enderror

    <form action="{{ route('registro') }}" method="POST">
        @csrf
        <div class="input-group">
            <label>Usuario</label>
            <input type="text" name="usuario" value="{{ old('usuario') }}" required placeholder="Elegí un usuario">
        </div>
        <div class="input-group">
            <label>Contraseña</label>
            <input type="password" name="password" required placeholder="••••••••">
        </div>
        <button type="submit" class="btn">Registrarse</button>
    </form>

    <span class="link">¿Ya tenés cuenta? <a href="{{ route('login') }}">Iniciá sesión</a></span>
</div>
@endsection
