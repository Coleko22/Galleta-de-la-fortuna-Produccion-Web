@extends('layouts.app')

@section('titulo', 'Galleta de la Fortuna')

@section('contenido')
<div class="card">
    <span class="top-user">{{ auth()->user()->usuario }}</span>
    <form action="{{ route('logout') }}" method="POST" style="display:inline;">
        @csrf
        <button type="submit" class="top-logout">Salir →</button>
    </form>

    <span class="cookie">🥠</span>
    <h1>Galleta de la Fortuna</h1>
    <p class="sub">Descubrí tu consejo de hoy</p>

    @if (session('error'))
        <div class="error">{{ session('error') }}</div>
    @endif

    <a href="{{ route('galleta.abrir') }}" class="btn">Abre tu galleta</a>

    <div class="acciones">
        <a href="{{ route('historial.index') }}" class="btn-outline">Ver mi historial</a>
        @if (auth()->user()->esAdmin())
            <a href="{{ route('admin.index') }}" class="btn-outline">Panel de admin</a>
        @endif
    </div>
</div>
@endsection
