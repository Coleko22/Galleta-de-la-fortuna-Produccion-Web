<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

#[Fillable(['usuario', 'password', 'rol'])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable
{

    use HasFactory, Notifiable;

    public const ROL_USUARIO = 'usuario';
    public const ROL_ADMIN = 'administrador';

    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }

   
    public function galletasAbiertas(): HasMany
    {
        return $this->hasMany(GalletaAbierta::class);
    }

    
    public function esAdmin(): bool
    {
        return $this->rol === self::ROL_ADMIN;
    }
}
