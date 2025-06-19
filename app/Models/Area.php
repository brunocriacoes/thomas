<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'evento_id'];

    public function evento()
    {
        return $this->belongsTo(Evento::class);
    }
}
