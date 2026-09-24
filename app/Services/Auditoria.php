<?php

namespace App\Services;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\File;


class Auditoria
{

    private const SEP = ' | ';

   
    private static function ruta(): string
    {
        return storage_path('logs/auditoria.log');
    }

    
   
    public static function registrar(string $accion, ?string $usuario = null, string $detalle = ''): void
    {
        $fecha   = Carbon::now()->format('Y-m-d H:i:s');
        $usuario = $usuario ?: 'anonimo';

        $linea = implode(self::SEP, [$fecha, $accion, "usuario: {$usuario}", $detalle]) . PHP_EOL;

   
        File::append(self::ruta(), $linea);
    }

   
    public static function leer(): array
    {
        if (! File::exists(self::ruta())) {
            return [];
        }

        $lineas = file(self::ruta(), FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        $registros = [];
        foreach ($lineas as $linea) {
            $partes = explode(self::SEP, $linea);

            $registros[] = [
                'fecha'   => $partes[0] ?? '',
                'accion'  => $partes[1] ?? '',
                'usuario' => isset($partes[2]) ? str_replace('usuario: ', '', $partes[2]) : '',
                'detalle' => $partes[3] ?? '',
            ];
        }

       
        return array_reverse($registros);
    }
}
