@extends('layouts.app')

@section('titulo', 'Historial de ' . $usuario->usuario . ' - Panel de administración')

@section('contenido')
<div class="card card-admin">
    <h1>Historial de {{ $usuario->usuario }}</h1>
    <p class="sub">Todas las galletas abiertas por este usuario</p>

    @include('admin._nav')

    @forelse ($galletas as $galleta)
        <div class="hist-item">
            <div class="txt">"{{ $galleta->mensaje }}"</div>
            <div class="fecha">
                {{ $galleta->abierta_en->locale('es')->translatedFormat('d/m/Y H:i') }} hs
            </div>
        </div>
    @empty
        <p class="meta">Este usuario todavía no abrió ninguna galleta.</p>
    @endforelse

    <div style="margin-top: 12px;">
        {{ $galletas->links() }}
    </div>

    <div class="acciones">
        <a href="{{ route('admin.usuarios.index') }}" class="btn-outline">Volver a usuarios</a>
    </div>
</div>
@endsection
