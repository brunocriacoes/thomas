<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\User;

class ResponsavelAluno extends Model
{
    protected $fillable = [
        'usuario_id',
        'aluno_id',
        'parentesco'
    ];

    public function usuario(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function aluno(): BelongsTo
    {
        return $this->belongsTo(Aluno::class);
    }
}
