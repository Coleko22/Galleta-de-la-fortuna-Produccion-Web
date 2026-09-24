@extends('layouts.app')

@section('titulo', 'Panel de administración - Galleta de la Fortuna')

@section('contenido')
<div class="card card-admin">
    <h1>Panel de administración</h1>
    <p class="sub">Bienvenido/a, {{ auth()->user()->usuario }}</p>

    @include('admin._nav')

    <div class="stat-grid">
        <div class="stat-box">
            <div class="num">{{ $totalMensajes }}</div>
            <div class="lbl">Mensajes cargados</div>
        </div>
        <div class="stat-box">
            <div class="num">{{ $totalUsuarios }}</div>
            <div class="lbl">Usuarios registrados</div>
        </div>
        <div class="stat-box">
            <div class="num">{{ $totalGalletas }}</div>
            <div class="lbl">Galletas abiertas</div>
        </div>
    </div>

    <p class="meta" style="text-align:center;">
        Usá el menú de arriba para administrar los mensajes de la fortuna, gestionar usuarios
        y ver estadísticas de uso de la aplicación.
    </p>

    <div class="acciones">
        <a href="{{ route('galleta.index') }}" class="btn-outline">Volver al inicio</a>
    </div>
</div>
@endsection
