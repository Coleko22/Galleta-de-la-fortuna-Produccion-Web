<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


#[Fillable(['mensaje'])]
class Mensaje extends Model
{
    protected $table = 'mensajes';

    public function aperturas(): HasMany
    {
        return $this->hasMany(GalletaAbierta::class, 'mensaje_id');
    }

 
    public static function random(?int $excluir = null): ?self
    {
        return static::query()
            ->when($excluir, fn ($q) => $q->where('id', '!=', $excluir))
            ->inRandomOrder()
            ->first();
    }
}
