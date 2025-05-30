<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SolicitacaoSaque extends Model
{
    protected $fillable = [
        'escola_id',
        'valor',
        'chave_pix',
        'status'
    ];

    public function escola(): BelongsTo
    {
        return $this->belongsTo(Escola::class);
    }
}
