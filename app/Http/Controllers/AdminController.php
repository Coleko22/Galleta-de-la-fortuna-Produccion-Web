<?php

namespace App\Http\Controllers;

use App\Models\GalletaAbierta;
use App\Models\Mensaje;
use App\Models\User;
use App\Services\Auditoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
 
    public function index()
    {
        return view('admin.dashboard', [
            'totalMensajes' => Mensaje::count(),
            'totalUsuarios' => User::count(),
            'totalGalletas' => GalletaAbierta::count(),
        ]);
    }

    public function auditoria()
    {
        $registros = Auditoria::leer();

        return view('admin.auditoria', ['registros' => $registros]);
    }

 
    public function mensajesIndex()
    {
        $mensajes = Mensaje::withCount('aperturas')
            ->latest('id')
            ->paginate(10);

        return view('admin.mensajes.index', ['mensajes' => $mensajes]);
    }

    public function mensajesCreate()
    {
        return view('admin.mensajes.create');
    }

    private function reglasMensaje(): array
    {
        return [
            'mensaje' => ['required', 'string', 'min:10', 'max:500'],
        ];
    }

    public function mensajesStore(Request $request)
    {
        $validator = Validator::make($request->all(), $this->reglasMensaje());

        if ($validator->fails()) {
            return redirect()
                ->route('admin.mensajes.create')
                ->withErrors($validator)
                ->withInput();
        }

        $mensaje = Mensaje::create($validator->validated());

        Auditoria::registrar('MENSAJE_CREADO', Auth::user()?->usuario, "Mensaje #{$mensaje->id}");

        return redirect()
            ->route('admin.mensajes.index')
            ->with('exito', 'Mensaje creado correctamente.');
    }

    public function mensajesEdit(Mensaje $mensaje)
    {
        return view('admin.mensajes.edit', ['mensaje' => $mensaje]);
    }

    public function mensajesUpdate(Request $request, Mensaje $mensaje)
    {
        $validator = Validator::make($request->all(), $this->reglasMensaje());

        if ($validator->fails()) {
            return redirect()
                ->route('admin.mensajes.edit', $mensaje)
                ->withErrors($validator)
                ->withInput();
        }

        $mensaje->update($validator->validated());

        Auditoria::registrar('MENSAJE_EDITADO', Auth::user()?->usuario, "Mensaje #{$mensaje->id}");

        return redirect()
            ->route('admin.mensajes.index')
            ->with('exito', 'Mensaje actualizado correctamente.');
    }

    public function mensajesDestroy(Mensaje $mensaje)
    {
        $id = $mensaje->id;
        $mensaje->delete();

        Auditoria::registrar('MENSAJE_ELIMINADO', Auth::user()?->usuario, "Mensaje #{$id}");

        return redirect()
            ->route('admin.mensajes.index')
            ->with('exito', 'Mensaje eliminado correctamente.');
    }

   
    public function usuariosIndex()
    {
        $usuarios = User::withCount('galletasAbiertas')
            ->orderBy('usuario')
            ->paginate(10);

        return view('admin.usuarios.index', ['usuarios' => $usuarios]);
    }

    public function usuarioHistorial(User $usuario)
    {
        $galletas = GalletaAbierta::where('user_id', $usuario->id)
            ->latest('abierta_en')
            ->paginate(10);

        return view('admin.usuarios.historial', [
            'usuario'  => $usuario,
            'galletas' => $galletas,
        ]);
    }



    public function estadisticas()
    {
        $totalMensajesMostrados = GalletaAbierta::count();
        $totalUsuarios = User::count();

        $mensajesFrecuentes = GalletaAbierta::select('mensaje_id', DB::raw('COUNT(*) as cantidad'))
            ->whereNotNull('mensaje_id')
            ->groupBy('mensaje_id')
            ->orderByDesc('cantidad')
            ->limit(5)
            ->with('mensajeModel')
            ->get();

        $usuariosFrecuentes = GalletaAbierta::select('user_id', DB::raw('COUNT(*) as cantidad'))
            ->groupBy('user_id')
            ->orderByDesc('cantidad')
            ->limit(3)
            ->with('user')
            ->get();

        return view('admin.estadisticas', [
            'totalMensajesMostrados' => $totalMensajesMostrados,
            'totalUsuarios'          => $totalUsuarios,
            'mensajesFrecuentes'     => $mensajesFrecuentes,
            'usuariosFrecuentes'     => $usuariosFrecuentes,
        ]);
    }
}
