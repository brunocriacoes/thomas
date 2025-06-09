<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fatura extends Model
{
    use HasFactory;

    protected $table = 'faturas';

    protected $fillable = [
        'plano_id',
        'escola_id',
        'user_id',
        'aluno_id',
        'valor',
        'referencia',
        'referencia_pagamento',
        'descricao',
        'link_pdf',
        'link_comprovante',
        'barcode',
        'qr_payload',
        'qr_image_64',
        'status_pagamento',
        'data_vencimento',
    ];

    public function plano()
    {
        return $this->belongsTo(Plano::class);
    }

    public function escola()
    {
        return $this->belongsTo(Escola::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function aluno()
    {
        return $this->belongsTo(Aluno::class);
    }
}
