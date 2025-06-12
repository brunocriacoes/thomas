<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Evento extends Model
{
    use HasFactory;

    protected $table = 'eventos';

    protected $fillable = [
        'escola_id',
        'nome',
        'descricao',
        'data_inicio',
        'data_final',
        'horario_inicio',
        'horario_final',
        'telefone',
        'url_foto_evento',
        'url_foto_evento_mesa',
        'link_google_map',
        'link_caralogo',
        'scrip_js',
    ];

    public function escola()
    {
        return $this->belongsTo(Escola::class);
    }
}
