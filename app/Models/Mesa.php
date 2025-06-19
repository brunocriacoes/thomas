<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Mesa extends Model
{
    use HasFactory;

    protected $table = 'mesas';

    protected $fillable = [
        'evento_id',
        'url_foto',
        'quantidade_cadeiras',
        'localizacao',
        'preco',
        'area',
        'numero_mesa',
    ];

    public function evento()
    {
        return $this->belongsTo(Evento::class);
    }
    
    public function area()
    {
        return $this->belongsTo(\App\Models\Area::class, 'area_id');
    }
}
