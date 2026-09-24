<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


#[Fillable(['user_id', 'mensaje_id', 'mensaje', 'abierta_en'])]
class GalletaAbierta extends Model
{
    protected $table = 'galletas_abiertas';

    protected function casts(): array
    {
        return [
            'abierta_en' => 'datetime',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function mensajeModel(): BelongsTo
    {
        return $this->belongsTo(Mensaje::class, 'mensaje_id');
    }
}
