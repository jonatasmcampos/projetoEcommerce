<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdTamCor extends Model
{
    use HasFactory;
    protected $table = "prod_tam_cor";

    protected $fillable = [
        'produto_id',
        'tamanho_id',
        'cor_id',
    ];

    public function produto()
    {
        return $this->hasOne('App\Models\Produto', 'id', 'produto_id');
    }

    public function tamanho()
    {
        return $this->belongsTo('App\Models\Tamanho');
    }

    public function cor()
    {
        return $this->belongsTo('App\Models\Cor');
    }

    public function estoque()
    {
        return $this->hasOne('App\Models\Estoque');
    }
}
