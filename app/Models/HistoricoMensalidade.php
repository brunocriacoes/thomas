<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoricoMensalidade extends Model
{
    use HasFactory;

    protected $fillable = [
        'escola_id',
        'mensalidade_id',
        'valor',
        'data_vencimento',
        'status',
        'codigo_referencia',
        'pagamento_id',
    ];

    public function escola()
    {
        return $this->belongsTo(Escola::class);
    }

    public function mensalidade()
    {
        return $this->belongsTo(Mensalidade::class);
    }
}
