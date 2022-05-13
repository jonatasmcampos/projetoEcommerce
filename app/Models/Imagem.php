<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Imagem extends ModelPadrao
{
    use HasFactory;
    protected $table = "imagems";
    protected $fillable = [
        'nome',
        'prioridade',
        'id_produto',
    ];
}
