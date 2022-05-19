<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Produto extends ModelPadrao
{
    use HasFactory;
    protected $table = "produtos";
    protected $fillable = [
        'nome',
        'custo',
        'lucro',
        'cor',
        'preco',
    ];
    public function prodTamCors()
    {
        return $this->hasmany('App\Models\ProdTamCor');
    }

    public function categoria()
    {
        return $this->belongsTo('App\Models\Categoria');
    }

    public function imagens()
    {
        return $this->hasMany('App\Models\Imagem');
    }
}
