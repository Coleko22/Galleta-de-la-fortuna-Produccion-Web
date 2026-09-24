<div class="admin-nav">
    <a href="{{ route('admin.index') }}" class="{{ request()->routeIs('admin.index') ? 'activo' : '' }}">Panel</a>
    <a href="{{ route('admin.mensajes.index') }}" class="{{ request()->routeIs('admin.mensajes.*') ? 'activo' : '' }}">Mensajes</a>
    <a href="{{ route('admin.usuarios.index') }}" class="{{ request()->routeIs('admin.usuarios.*') ? 'activo' : '' }}">Usuarios</a>
    <a href="{{ route('admin.estadisticas') }}" class="{{ request()->routeIs('admin.estadisticas') ? 'activo' : '' }}">Estadísticas</a>
    <a href="{{ route('admin.auditoria') }}" class="{{ request()->routeIs('admin.auditoria') ? 'activo' : '' }}">Auditoría</a>
    <a href="{{ route('galleta.index') }}">Salir del panel</a>
</div>
