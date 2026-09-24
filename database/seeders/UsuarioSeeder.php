<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsuarioSeeder extends Seeder
{
    public function run(): void
    {

        $usuarios = [
            'colo'   => User::ROL_ADMIN,
            'fran'   => User::ROL_USUARIO,
            'marce'  => User::ROL_USUARIO,
            'franco' => User::ROL_USUARIO,
        ];

        foreach ($usuarios as $u => $rol) {
            User::create([
                'usuario'  => $u,
                'password' => '1234',
                'rol'      => $rol,
            ]);
        }
    }
}
