<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProdutoEvento extends Model
{
    protected $fillable = [
        'evento_id',
        'url_foto',
        'nome',
        'preco',
        'estoque'
    ];

    public function evento(): BelongsTo
    {
        return $this->belongsTo(Evento::class);
    }
}
