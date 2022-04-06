<?php

namespace App\Models;

class Produto extends ModelPadrao
{
    protected $table = "produtos";
    protected $fillable = [
        'produto',
        'descricao',
        'preco',
        'desconto',
        'id_categoria'
    ];

    public function categoria(){
        return $this->hasOne('App\Models\Categoria', 'id', 'id_categoria');
    }
}
