<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\User;

class Pagamento extends Model
{
    protected $fillable = [
        'usuario_id',
        'aluno_id',
        'plano_id',
        'evento_id',
        'tipo',
        'valor',
        'status',
        'data_pagamento'
    ];

    public function usuario(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function aluno(): BelongsTo
    {
        return $this->belongsTo(Aluno::class);
    }

    public function plano(): BelongsTo
    {
        return $this->belongsTo(Plano::class);
    }

    public function evento(): BelongsTo
    {
        return $this->belongsTo(Evento::class);
    }
}
