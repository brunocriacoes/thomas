<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CompraItem extends Model
{
    protected $fillable = [
        'compra_id',
        'produto_id',
        'quantidade',
        'preco_unitario'
    ];

    public function compra(): BelongsTo
    {
        return $this->belongsTo(CompraEvento::class);
    }

    public function produto(): BelongsTo
    {
        return $this->belongsTo(ProdutoEvento::class);
    }
}
