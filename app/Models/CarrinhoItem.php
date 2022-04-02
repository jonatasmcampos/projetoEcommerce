<?php

namespace App\Models;

class CarrinhoItem extends ModelPadrao
{
    protected $table = "carrinho_items";
    protected $fillable = [
        'quantidade',
        'id_produto',
        'id_carrinho',
    ];
}
