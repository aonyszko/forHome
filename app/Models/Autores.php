<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Autores extends Model
{
    use HasFactory;

    protected $table = "autores";
    protected $fillable = ['nome', 'dataNascimento', 'cpf', 'genero_id', 'nacionalidade_id'];

    public function genero(){
        return $this->belongsTo("App\Models\Generos");
    }

    public function nacionalidade(){
        return $this->belongsTo("App\Models\Nacionalidades");
    }

    public function dicas(){
        return $this->hasMany("App\Models\Dicas");
    }


}
