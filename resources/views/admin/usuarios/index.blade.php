@extends('layouts.app')

@section('titulo', 'Usuarios - Panel de administración')

@section('contenido')
<div class="card card-admin">
    <h1>Usuarios registrados</h1>
    <p class="sub">Consultá el historial de cada usuario</p>

    @include('admin._nav')

    <table class="admin-table">
        <thead>
            <tr>
                <th>Usuario</th>
                <th>Rol</th>
                <th>Galletas abiertas</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($usuarios as $usuario)
                <tr>
                    <td>{{ $usuario->usuario }}</td>
                    <td>
                        @if ($usuario->esAdmin())
                            <span class="badge badge-admin">Administrador</span>
                        @else
                            <span class="badge badge-usuario">Usuario</span>
                        @endif
                    </td>
                    <td>{{ $usuario->galletas_abiertas_count }}</td>
                    <td>
                        <a href="{{ route('admin.usuarios.historial', $usuario) }}" class="btn-sm btn-ver">Ver historial</a>
                    </td>
                </tr>
            @empty
                <tr><td colspan="4" class="meta">No hay usuarios registrados.</td></tr>
            @endforelse
        </tbody>
    </table>

    {{ $usuarios->links() }}
</div>
@endsection
