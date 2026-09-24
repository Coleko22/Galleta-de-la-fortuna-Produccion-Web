<?php

namespace App\Http\Controllers;

use App\Models\GalletaAbierta;
use App\Models\Mensaje;
use App\Services\Auditoria;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;


class GalletaController extends Controller
{
    
    public function index()
    {
        return view('galleta.index');
    }

    
    public function abrir()
    {
        $user = Auth::user();

        
        $ultimoMensajeId = GalletaAbierta::where('user_id', $user->id)
            ->latest('abierta_en')
            ->value('mensaje_id');

        $mensaje = Mensaje::random($ultimoMensajeId);

        if (! $mensaje) {
            return redirect()
                ->route('galleta.index')
                ->with('error', 'No hay mensajes disponibles.');
        }

        $galleta = GalletaAbierta::create([
            'user_id'    => $user->id,
            'mensaje_id' => $mensaje->id,
            'mensaje'    => $mensaje->mensaje,
            'abierta_en' => Carbon::now(),
        ]);

        
        Auditoria::registrar('GALLETA_ABIERTA', $user->usuario, "Mensaje #{$mensaje->id}");

        $clima = $this->obtenerClima();

        return view('galleta.mensaje', [
            'galleta' => $galleta,
            'clima'   => $clima,
        ]);
    }

    
    private function obtenerClima(): ?array
    {
        try {
            $resp = Http::timeout(4)->get('https://api.open-meteo.com/v1/forecast', [
                'latitude'  => -34.61,
                'longitude' => -58.38,
                'current'   => 'temperature_2m,weather_code',
                'timezone'  => 'America/Argentina/Buenos_Aires',
            ]);

            if (! $resp->ok()) {
                return null;
            }

            $current = $resp->json('current');

            return [
                'temperatura' => $current['temperature_2m'] ?? null,
                'descripcion' => $this->descripcionClima($current['weather_code'] ?? null),
            ];
        } catch (\Throwable $e) {
            return null;
        }
    }

    
    private function descripcionClima(?int $code): string
    {
        return match (true) {
            $code === 0                    => 'Despejado ☀️',
            in_array($code, [1, 2, 3])     => 'Parcialmente nublado ⛅',
            in_array($code, [45, 48])      => 'Niebla 🌫️',
            $code >= 51 && $code <= 67     => 'Llovizna 🌦️',
            $code >= 71 && $code <= 77     => 'Nieve ❄️',
            $code >= 80 && $code <= 82     => 'Lluvia 🌧️',
            $code >= 95                    => 'Tormenta ⛈️',
            default                        => 'Sin datos',
        };
    }
}
