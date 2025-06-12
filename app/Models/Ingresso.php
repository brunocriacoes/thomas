<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ingresso extends Model
{
    use HasFactory;

    protected $table = 'ingressos';

    protected $fillable = [
        'evento_id',
        'mesa_id',
        'user_id',
        'preco',
        'quantidade',
        'status_pagamento',
        'data_compra',
        'aluno_id',
    ];

    // Relacionamento: Ingresso pertence a um evento
    public function evento()
    {
        return $this->belongsTo(Evento::class);
    }

    // Relacionamento: Ingresso pertence a uma mesa (opcional)
    public function mesa()
    {
        return $this->belongsTo(Mesa::class);
    }

    // Relacionamento: Ingresso pertence a um usuário
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relacionamento: Ingresso pertence a um aluno (opcional)
    public function aluno()
    {
        return $this->belongsTo(Aluno::class);
    }
}
