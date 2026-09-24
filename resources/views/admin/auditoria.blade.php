@extends('layouts.app')

@section('titulo', 'Auditoría - Galleta de la Fortuna')

@section('contenido')
<div class="card card-admin">
    <h1>Log de auditoría</h1>
    <p class="sub">Eventos registrados en el servidor</p>

    @include('admin._nav')

    @forelse ($registros as $r)
        <div class="hist-item" style="display: flex; flex-direction: column; gap: 2px;">
            <div style="display:flex; justify-content:space-between; align-items:center; gap:8px;">
                <span style="font-weight:700; font-size:12px; color:#1e4d00;">{{ $r['accion'] }}</span>
                <span class="fecha">{{ $r['fecha'] }}</span>
            </div>
            <div style="font-size:12px; color:#2d5e00;">
                {{ $r['usuario'] }}
                @if ($r['detalle'])
                    — {{ $r['detalle'] }}
                @endif
            </div>
        </div>
    @empty
        <p class="meta">Todavía no hay eventos registrados.</p>
    @endforelse
</div>
@endsection
