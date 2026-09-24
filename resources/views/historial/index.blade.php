@extends('layouts.app')

@section('titulo', 'Mi Historial - Galleta de la Fortuna')

@section('contenido')
<div class="card card-wide">
    <h1>Mi historial de galletas</h1>
    <p class="sub">Todas las galletas que abriste</p>

    @forelse ($galletas as $galleta)
        <div class="hist-item">
            <div class="txt">"{{ $galleta->mensaje }}"</div>
            <div class="fecha">
                {{ $galleta->abierta_en->locale('es')->translatedFormat('d/m/Y H:i') }} hs
            </div>
        </div>
    @empty
        <p class="meta">Todavía no abriste ninguna galleta.</p>
    @endforelse

    <div style="margin-top: 12px;">
        {{ $galletas->links() }}
    </div>

    <div class="acciones">
        <a href="{{ route('galleta.index') }}" class="btn-outline">Volver al inicio</a>
    </div>
</div>
@endsection
