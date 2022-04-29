<?php

namespace App\Models;

class Estoque extends ModelPadrao
{
    protected $table = "estoques";
    protected $fillable = [
        'quantidade',
        'id_produto'
    ];

    public function produto(){
        return $this->hasOne('App\Models\Produto', 'id', 'id_produto');
    }
}
