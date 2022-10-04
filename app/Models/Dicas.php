<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dicas extends Model
{
    use HasFactory;

    protected $table = "dicas";
    protected $fillable = ['titulo', 'descricao', 'autores_id'];

    public function autores(){
        return $this->belongsTo("App\Models\Autores");
    }
}
