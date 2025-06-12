<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Entrada extends Model
{
    use HasFactory;

    protected $table = 'entradas';

    protected $fillable = [
        'codigo',
        'escola_id',
        'evento_id',
        'nome',
        'cpf',
        'data_hora_entrada',
        'status',
        'observacao',
    ];

    // Relacionamento: Entrada pertence a uma escola
    public function escola()
    {
        return $this->belongsTo(Escola::class);
    }

    // Relacionamento: Entrada pertence a um evento
    public function evento()
    {
        return $this->belongsTo(Evento::class);
    }
}
