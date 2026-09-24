@extends('layouts.app')

@section('titulo', 'Mensajes - Panel de administración')

@section('contenido')
<div class="card card-admin">
    <h1>Mensajes de la fortuna</h1>
    <p class="sub">Alta, baja y modificación de mensajes</p>

    @include('admin._nav')

    @if (session('exito'))
        <div class="exito">{{ session('exito') }}</div>
    @endif

    <div class="acciones" style="justify-content:flex-end; margin-bottom: 10px;">
        <a href="{{ route('admin.mensajes.create') }}" class="btn-outline">+ Nuevo mensaje</a>
    </div>

    <table class="admin-table">
        <thead>
            <tr>
                <th>#</th>
                <th>Mensaje</th>
                <th>Veces mostrado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($mensajes as $mensaje)
                <tr>
                    <td>{{ $mensaje->id }}</td>
                    <td>{{ $mensaje->mensaje }}</td>
                    <td>{{ $mensaje->aperturas_count }}</td>
                    <td>
                        <div class="fila-acciones">
                            <a href="{{ route('admin.mensajes.edit', $mensaje) }}" class="btn-sm btn-editar">Editar</a>
                            <form action="{{ route('admin.mensajes.destroy', $mensaje) }}" method="POST"
                                  onsubmit="return confirm('¿Eliminar este mensaje? Esta acción no se puede deshacer.');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-sm btn-eliminar">Eliminar</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr><td colspan="4" class="meta">Todavía no hay mensajes cargados.</td></tr>
            @endforelse
        </tbody>
    </table>

    {{ $mensajes->links() }}
</div>
@endsection
