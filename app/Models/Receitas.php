<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receitas extends Model
{
    use HasFactory;

    protected $table = "receitas";
    protected $fillable = ['titulo', 'descricao', 'autores_id'];

    public function receitasPaises(){
        return $this->hasMany("App\Models\ReceitasPaises");
    }

    public function autores(){
        return $this->belongsTo("App\Models\Autores");
    }
}
