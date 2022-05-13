<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Produto extends ModelPadrao
{
    use HasFactory;
    protected $table = "produtos";
    protected $fillable = [
        'nome',
        'custo',
        'lucro',
        'cor',
        'preco',
    ];

    public function categoria()
    {
        return $this->belongsTo('App\Models\Categoria');
    }

    public function tamanhos()
    {
        return $this->belongsToMany('App\Models\Tamanho');
    }

    public function cores()
    {
        return $this->belongsToMany('App\Models\Cor', 'produto_cor');
    }

    public function imagens()
    {
        return $this->hasMany('App\Models\Imagem');
    }
}
