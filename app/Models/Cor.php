<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cor extends Model
{
    use HasFactory;
    protected $table = "cores";
    protected $fillable = [
        'nome'
    ];

    public function produtos()
    {
        return $this->belongsToMany('App\Models\Produto');
    }

    public function tamanhos()
    {
        return $this->belongsToMany('App\Models\Tamanho', 'tamanho_cor');
    }

}
