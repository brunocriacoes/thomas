<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Plano extends Model
{
    protected $fillable = [
        'escola_id',
        'nome',
        'periodo',
        'horas_inclusas',
        'valor_mensal',
        'valor_hora_extra'
    ];

    public function escola(): BelongsTo
    {
        return $this->belongsTo(Escola::class);
    }

    public function horarios(): HasMany
    {
        return $this->hasMany(PlanoHorario::class);
    }
}
