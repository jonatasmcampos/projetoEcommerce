<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Categoria extends ModelPadrao
{
    use HasFactory;
    protected $table = "categorias";
    protected $fillable = [
        'nome'
    ];


    public function produtos()
    {
        return $this->hasMany('App\Models\Produto');
    }

}
