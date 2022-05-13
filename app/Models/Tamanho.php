<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tamanho extends Model
{
    use HasFactory;
    protected $table = "tamanhos";
    protected $fillable = [
        'nome'
    ];

    // public function produtos()
    // {
    //     return $this->belongsToMany('App\Models\Produto');
    // }

    public function cores()
    {
        return $this->belongsToMany('App\Models\Cor');
    }

}
