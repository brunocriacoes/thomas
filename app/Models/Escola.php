<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\User;

class Escola extends Model
{
    protected $fillable = [
        'nome',
        'cnpj',
        'logo_url',
        'cor_primaria',
        'cor_secundaria',
        'dominio',
        'status'
    ];

    public function usuarios(): HasMany
    {
        return $this->hasMany(User::class);
    }

    public function planos(): HasMany
    {
        return $this->hasMany(Plano::class);
    }

    public function alunos(): HasMany
    {
        return $this->hasMany(Aluno::class);
    }

    public function eventos(): HasMany
    {
        return $this->hasMany(Evento::class);
    }

    public function entradasSaidas(): HasMany
    {
        return $this->hasMany(EntradaSaida::class);
    }

    public function saldo(): HasMany
    {
        return $this->hasMany(SaldoEscola::class);
    }

    public function solicitacoesSaque(): HasMany
    {
        return $this->hasMany(SolicitacaoSaque::class);
    }
}
