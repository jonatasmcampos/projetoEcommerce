<?php

namespace App\Models;

class Categoria extends ModelPadrao
{
    protected $table = "categorias";
    protected $fillable = [
        'nome'
    ];


    public function produtos()
    {
        return $this->hasMany('App\Models\Produto', 'id_categoria', 'id');
    }
}
