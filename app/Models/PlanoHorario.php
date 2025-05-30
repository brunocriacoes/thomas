<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PlanoHorario extends Model
{
    protected $fillable = [
        'plano_id',
        'dia_semana',
        'hora_inicio',
        'hora_fim'
    ];

    public function plano(): BelongsTo
    {
        return $this->belongsTo(Plano::class);
    }
}
