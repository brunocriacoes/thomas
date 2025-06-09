<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plano extends Model
{
    use HasFactory;

    protected $table = 'planos';

    protected $fillable = [
        'periodo',
        'turno_hora',
        'turno_preco_hora',
        'socializacao_hora',
        'socializacao_preco_hora',
        'ecola_id',
        'user_id',
        'aluno_id',
        'valor',
        'status',
        'observacao',
    ];

    public function escola()
    {
        return $this->belongsTo(Escola::class, 'ecola_id');
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
