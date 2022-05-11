<?php

namespace App\Models;

class Produto extends ModelPadrao
{
    protected $table = "produtos";
    protected $fillable = [
        'nome',
        'cor',
        'custo',
        'lucro',
        'preco',
        'estoque',
    ];

    public function categoria(){
        return $this->belongsTo('App\Models\Categoria');
    }

    public function tamanhos()
    {
        return $this->belongsToMany('App\Models\Tamanho');
    }

    public function imagens(){
        return $this->hasMany('App\Models\Imagem');
    }

}
