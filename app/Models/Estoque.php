<?php

namespace App\Models;

class Estoque extends ModelPadrao
{
    protected $table = "estoques";
    protected $fillable = [
        'quantidade',
        'id_produto'
    ];
}
