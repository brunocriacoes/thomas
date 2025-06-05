<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Aluno extends Model
{
    use HasFactory;

    protected $table = 'alunos';

    protected $fillable = [
        'nome',
        'genero',
        'data_de_nascimento',
        'cep',
        'rua',
        'numero',
        'cidade',
        'estado',
        'nacionalidade',
        'cpf',
        'rg',
        'plano_de_saude',
        'quem_pode_buscar',
        'alergias',
        'foto',
        'observacao',
        'escola_id',
        'status',
    ];

    protected $casts = [
        'data_de_nascimento' => 'date',
    ];

    public function responsavel()
    {
        return $this->belongsTo(User::class, 'quem_pode_buscar');
    }

    public function escola()
    {
        return $this->belongsTo(Escola::class);
    }

    public function quemPodeBuscar(): BelongsTo
    {
        return $this->belongsTo(User::class, 'quem_pode_buscar');
    }
}
