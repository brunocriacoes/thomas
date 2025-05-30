<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Aluno extends Model
{
    protected $fillable = [
        'escola_id',
        'foto_url',
        'data_nascimento',
        'status',
        'nome',
        'plano_id'
    ];

    public function escola(): BelongsTo
    {
        return $this->belongsTo(Escola::class);
    }

    public function plano(): BelongsTo
    {
        return $this->belongsTo(Plano::class);
    }

    public function responsaveis(): HasMany
    {
        return $this->hasMany(ResponsavelAluno::class);
    }
}
