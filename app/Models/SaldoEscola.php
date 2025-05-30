<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SaldoEscola extends Model
{
    protected $fillable = [
        'escola_id',
        'saldo_atual'
    ];

    public function escola(): BelongsTo
    {
        return $this->belongsTo(Escola::class);
    }
}
