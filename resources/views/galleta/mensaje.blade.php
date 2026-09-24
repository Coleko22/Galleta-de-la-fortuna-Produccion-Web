@extends('layouts.app')

@section('titulo', 'Tu Mensaje - Galleta de la Fortuna')

@section('contenido')
<div class="card">
    <span class="cookie">🥠</span>
    <h1>Tu galleta dice...</h1>

    <div class="mensaje-box">
        "{{ $galleta->mensaje }}"
    </div>

    <p class="meta">
        Abierta el {{ $galleta->abierta_en->locale('es')->translatedFormat('d \d\e F \d\e Y \a \l\a\s H:i') }} hs
    </p>

    @if ($clima && $clima['temperatura'] !== null)
        <div class="clima">
            {{ $clima['descripcion'] }} · {{ $clima['temperatura'] }}°C en Buenos Aires
        </div>
    @endif

    <a href="{{ route('galleta.abrir') }}" class="btn">Generar otro mensaje</a>

    <div class="acciones">
        <a href="{{ route('galleta.index') }}" class="btn-outline">Volver al inicio</a>
        <a href="{{ route('historial.index') }}" class="btn-outline">Mi historial</a>
    </div>
</div>
@endsection
