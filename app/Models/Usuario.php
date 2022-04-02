<?php

namespace App\Models;

class Usuario extends ModelPadrao
{
    protected $table = "usuarios";
    protected $fillable = [
        'nome',
        'email',
        'senha',
        'perfil',
        'cpf',
        'telefone',
        'foto'
    ];
}
