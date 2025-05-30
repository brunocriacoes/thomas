<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Evento extends Model
{
    protected $fillable = [
        'escola_id',
        'nome',
        'descricao',
        'imagem_url',
        'data_inicio',
        'data_fim',
        'andar'
    ];

    public function escola(): BelongsTo
    {
        return $this->belongsTo(Escola::class);
    }

    public function mesas(): HasMany
    {
        return $this->hasMany(MesaEvento::class);
    }

    public function produtos(): HasMany
    {
        return $this->hasMany(ProdutoEvento::class);
    }

    public function compras(): HasMany
    {
        return $this->hasMany(CompraEvento::class);
    }
}
