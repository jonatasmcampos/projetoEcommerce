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

    public function prodTamCor()
    {
        return $this->belongsTo('App\Models\ProdTamCor');
    }

}
