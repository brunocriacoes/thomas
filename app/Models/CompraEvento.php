<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\User;

class CompraEvento extends Model
{
    protected $fillable = [
        'usuario_id',
        'evento_id',
        'data_compra',
        'total'
    ];

    public function usuario(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function evento(): BelongsTo
    {
        return $this->belongsTo(Evento::class);
    }

    public function itens(): HasMany
    {
        return $this->hasMany(CompraItem::class);
    }
}
