@extends('layouts.app')

@section('titulo', 'Estadísticas - Panel de administración')

@section('contenido')
<div class="card card-admin">
    <h1>Estadísticas de uso</h1>
    <p class="sub">Información dinámica obtenida de la base de datos</p>

    @include('admin._nav')

    <div class="stat-grid">
        <div class="stat-box">
            <div class="num">{{ $totalMensajesMostrados }}</div>
            <div class="lbl">Mensajes mostrados</div>
        </div>
        <div class="stat-box">
            <div class="num">{{ $totalUsuarios }}</div>
            <div class="lbl">Usuarios registrados</div>
        </div>
    </div>

    <h1 style="font-size: 15px; margin-top: 1rem;">Top 5 mensajes más frecuentes</h1>
    <table class="admin-table">
        <thead>
            <tr>
                <th>#</th>
                <th>Mensaje</th>
                <th>Veces mostrado</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($mensajesFrecuentes as $fila)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $fila->mensajeModel->mensaje ?? '(mensaje eliminado)' }}</td>
                    <td>{{ $fila->cantidad }}</td>
                </tr>
            @empty
                <tr><td colspan="3" class="meta">Todavía no hay datos suficientes.</td></tr>
            @endforelse
        </tbody>
    </table>

    <h1 style="font-size: 15px; margin-top: 1rem;">Top 3 usuarios más activos</h1>
    <table class="admin-table">
        <thead>
            <tr>
                <th>#</th>
                <th>Usuario</th>
                <th>Galletas abiertas</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($usuariosFrecuentes as $fila)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $fila->user->usuario ?? '(usuario eliminado)' }}</td>
                    <td>{{ $fila->cantidad }}</td>
                </tr>
            @empty
                <tr><td colspan="3" class="meta">Todavía no hay datos suficientes.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
