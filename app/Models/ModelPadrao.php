<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelPadrao extends Model
{
    use HasFactory;

    protected $primaryKey = "id";

    public $incrementing = true; // incremento automatico para chave primária
    protected $fillable = [];
    public $timestamps = true; // created_at e updated_at

    
    public function beforeSave(){
        return true;
    }
    
    public function save(array $options = []){
        try {
            if(!$this->beforeSave()){
                return false;
            }

            return parent::save($options);
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }
}
