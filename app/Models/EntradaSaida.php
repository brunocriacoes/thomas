<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EntradaSaida extends Model
{
    protected $fillable = [
        'escola_id',
        'aluno_id',
        'hora_entrada',
        'hora_saida'
    ];

    public function escola(): BelongsTo
    {
        return $this->belongsTo(Escola::class);
    }

    public function aluno(): BelongsTo
    {
        return $this->belongsTo(Aluno::class);
    }
}
