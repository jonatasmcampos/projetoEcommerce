<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Carrinho extends ModelPadrao
{
    use HasFactory;
    protected $table = "carrinhos";
    protected $fillable = [
        'valor_total',
        'status',
        'data',
        'id_endereco'
    ];
}
