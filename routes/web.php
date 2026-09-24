<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GalletaController;
use App\Http\Controllers\HistorialController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'mostrarLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);

    Route::get('/registro', [AuthController::class, 'mostrarRegistro'])->name('registro');
    Route::post('/registro', [AuthController::class, 'registrar']);
});

Route::middleware('auth')->group(function () {
    Route::get('/', [GalletaController::class, 'index'])->name('galleta.index');
    Route::get('/abrir', [GalletaController::class, 'abrir'])->name('galleta.abrir');

    Route::get('/historial', [HistorialController::class, 'index'])->name('historial.index');

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

// Sección administrativa: solo usuarios autenticados con rol administrador.
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('index');
    Route::get('/auditoria', [AdminController::class, 'auditoria'])->name('auditoria');

    Route::get('/mensajes', [AdminController::class, 'mensajesIndex'])->name('mensajes.index');
    Route::get('/mensajes/crear', [AdminController::class, 'mensajesCreate'])->name('mensajes.create');
    Route::post('/mensajes', [AdminController::class, 'mensajesStore'])->name('mensajes.store');
    Route::get('/mensajes/{mensaje}/editar', [AdminController::class, 'mensajesEdit'])->name('mensajes.edit');
    Route::put('/mensajes/{mensaje}', [AdminController::class, 'mensajesUpdate'])->name('mensajes.update');
    Route::delete('/mensajes/{mensaje}', [AdminController::class, 'mensajesDestroy'])->name('mensajes.destroy');

    Route::get('/usuarios', [AdminController::class, 'usuariosIndex'])->name('usuarios.index');
    Route::get('/usuarios/{usuario}/historial', [AdminController::class, 'usuarioHistorial'])->name('usuarios.historial');

    Route::get('/estadisticas', [AdminController::class, 'estadisticas'])->name('estadisticas');
});
