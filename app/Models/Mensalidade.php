<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mensalidade extends Model
{
    use HasFactory;

    protected $fillable = [
        'escola_id',
        'valor',
        'observacao',
        'dia_pagamento',
    ];

    public function escola()
    {
        return $this->belongsTo(Escola::class);
    }
}
