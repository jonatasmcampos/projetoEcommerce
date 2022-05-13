<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Endereco extends ModelPadrao
{
    use HasFactory;
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
