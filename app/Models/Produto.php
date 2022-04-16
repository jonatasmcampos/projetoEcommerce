<?php

namespace App\Models;

class Produto extends ModelPadrao
{
    protected $table = "produtos";
    protected $fillable = [
        'nome',
        'descricao',
        'preco',
        'desconto',
        'id_categoria'
    ];

    public function categoria(){
        return $this->hasOne('App\Models\Categoria', 'id', 'id_categoria');
    }


    public function estoque(){
        return $this->hasOne('App\Models\Estoque', 'id_produto', 'id');
    }
}
