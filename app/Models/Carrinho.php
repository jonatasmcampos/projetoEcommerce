<?php

namespace App\Models;

class Carrinho extends ModelPadrao
{
    protected $table = "carrinhos";
    protected $fillable = [
        'valor_total',
        'status',
        'data',
        'id_endereco'
    ];
}
