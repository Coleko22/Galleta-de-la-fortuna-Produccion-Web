@extends('layouts.app')

@section('titulo', 'Nuevo mensaje - Panel de administración')

@section('contenido')
<div class="card card-admin" style="width: 520px;">
    <h1>Nuevo mensaje</h1>
    <p class="sub">Cargá el texto que aparecerá en la galleta</p>

    @if ($errors->any())
        <div class="error">{{ $errors->first() }}</div>
    @endif

    <form action="{{ route('admin.mensajes.store') }}" method="POST">
        @csrf
        <div class="input-group">
            <label for="mensaje">Mensaje</label>
            <textarea id="mensaje" name="mensaje" class="form-textarea"
                      required minlength="10" maxlength="500"
                      placeholder="Escribí el mensaje de la fortuna...">{{ old('mensaje') }}</textarea>
        </div>

        <button type="submit" class="btn">Guardar</button>
    </form>

    <div class="acciones">
        <a href="{{ route('admin.mensajes.index') }}" class="btn-outline">Cancelar</a>
    </div>
</div>
@endsection
