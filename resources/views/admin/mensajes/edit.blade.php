@extends('layouts.app')

@section('titulo', 'Editar mensaje - Panel de administración')

@section('contenido')
<div class="card card-admin" style="width: 520px;">
    <h1>Editar mensaje #{{ $mensaje->id }}</h1>
    <p class="sub">Modificá el texto del mensaje</p>

    @if ($errors->any())
        <div class="error">{{ $errors->first() }}</div>
    @endif

    <form action="{{ route('admin.mensajes.update', $mensaje) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="input-group">
            <label for="mensaje">Mensaje</label>
            <textarea id="mensaje" name="mensaje" class="form-textarea"
                      required minlength="10" maxlength="500">{{ old('mensaje', $mensaje->mensaje) }}</textarea>
        </div>

        <button type="submit" class="btn">Actualizar</button>
    </form>

    <div class="acciones">
        <a href="{{ route('admin.mensajes.index') }}" class="btn-outline">Cancelar</a>
    </div>
</div>
@endsection
