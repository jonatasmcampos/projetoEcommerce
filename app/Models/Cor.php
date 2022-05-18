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
        return $this->belongsTo('App\Models\Produto');
    }

    public function prodTamCors()
    {
        return $this->hasMany('App\Models\Cor');
    }
    
    public function tamanhos()
    {
        return $this->belongsToMany('App\Models\Tamanho', 'prod_tam_cor');
    }

}
