<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tamanho extends Model
{
    protected $table = "tamanhos";
    protected $fillable = [
        'tamanho'
    ];

    public function produto()
    {
        return $this->belongsToMany('App\Models\Produto');
    }
}
