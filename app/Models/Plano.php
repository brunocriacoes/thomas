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
        'escola_id',
        'user_id',
        'aluno_id',
        'valor',
        'valor_socializacao',
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
