<?php

namespace App\Models;

class Imagem extends ModelPadrao
{
    protected $table = "imagems";
    protected $fillable = [
        'nome',
        'prioridade',
        'id_produto',
    ];
}
