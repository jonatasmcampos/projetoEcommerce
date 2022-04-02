<?php

namespace App\Models;

class Imagem extends ModelPadrao
{
    protected $table = "imagems";
    protected $fillable = [
        'imagem',
        'id_produto'
    ];
}
