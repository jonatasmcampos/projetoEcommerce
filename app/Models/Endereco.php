<?php

namespace App\Models;

class Endereco extends ModelPadrao
{
    protected $table = "enderecos";
    protected $fillable = [
        'rua',
        'numero',
        'bairro',
        'cidade',
        'estado',
        'cep',
        'id_usuario'
    ];
}
