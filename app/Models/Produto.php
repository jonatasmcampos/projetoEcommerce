<?php

namespace App\Models;

class Produto extends ModelPadrao
{
    protected $table = "produtos";
    protected $fillable = [
        'nome',
        'descricao',
        'preco',
        'custo',
        'desconto',
        'id_categoria'
    ];

    public function categoria(){
        return $this->hasOne('App\Models\Categoria', 'id', 'id_categoria');
    }


    public function estoque(){
        return $this->hasOne('App\Models\Estoque', 'id_produto', 'id');
    }

    public function imagens(){
        return $this->hasMany('App\Models\Imagem', 'id_produto', 'id');
    }

}
