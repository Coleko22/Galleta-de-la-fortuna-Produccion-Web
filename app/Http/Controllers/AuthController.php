<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\Auditoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function mostrarLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $datos = $request->validate([
            'usuario'  => ['required', 'string'],
            'password' => ['required', 'string'],
        ]);

        if (! Auth::attempt($datos, $request->boolean('recordarme'))) {
           
            Auditoria::registrar('LOGIN_FALLIDO', $datos['usuario'], 'Credenciales inválidas');

            throw ValidationException::withMessages([
                'usuario' => 'Usuario o contraseña incorrectos.',
            ]);
        }

        $request->session()->regenerate();

      
        Auditoria::registrar('LOGIN_EXITOSO', $datos['usuario']);

        return redirect()->intended(route('galleta.index'));
    }

    public function mostrarRegistro()
    {
        return view('auth.register');
    }

    public function registrar(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'usuario'  => ['required', 'string', 'min:3', 'max:50', 'unique:users,usuario'],
            'password' => ['required', 'string', 'min:4'],
        ], [
            'usuario.unique' => 'Ese nombre de usuario ya está en uso.',
        ]);

        if ($validator->fails()) {
       
            $intento = $request->input('usuario', 'anonimo');
            $motivo  = $validator->errors()->first();
            Auditoria::registrar('REGISTRO_FALLIDO', $intento, $motivo);

            return redirect()->route('registro')->withErrors($validator)->withInput();
        }

        $user = User::create($validator->validated());

   
        Auditoria::registrar('NUEVO_USUARIO', $user->usuario, 'Cuenta creada');

        return redirect()
            ->route('login')
            ->with('exito', '¡Cuenta creada! Ya podés iniciar sesión.');
    }

    public function logout(Request $request)
    {
        $usuario = Auth::user()?->usuario;

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        Auditoria::registrar('LOGOUT', $usuario);

        return redirect()->route('login');
    }
}
