<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class CarrinhoItem extends ModelPadrao
{
    use HasFactory;
    protected $table = "carrinho_items";
    protected $fillable = [
        'quantidade',
        'id_produto',
        'id_carrinho',
    ];
}
