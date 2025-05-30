<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\User;

class MesaEvento extends Model
{
    protected $fillable = [
        'evento_id',
        'codigo',
        'lugares',
        'preco',
        'area',
        'reservado_por',
        'status_pagamento'
    ];

    public function evento(): BelongsTo
    {
        return $this->belongsTo(Evento::class);
    }

    public function reservadoPor(): BelongsTo
    {
        return $this->belongsTo(User::class, 'reservado_por');
    }
}
