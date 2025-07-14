<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MeioPagamento extends Model
{
    use HasFactory;

    protected $table = 'meios_pagamentos';

    protected $fillable = [
        'escola_id',
        'status',
        'chave',
        'codigo',
        'meio_pagamento',
        'tipo_pagamento',
        'a_partir',
    ];

    /**
     * Relacionamento com a Escola
     */
    public function escola()
    {
        return $this->belongsTo(Escola::class);
    }
}
