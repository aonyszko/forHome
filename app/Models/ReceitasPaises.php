<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReceitasPaises extends Model
{
    use HasFactory;

    protected $table = "receitas_paises";
    protected $fillable = ['receitas_id', 'paises_id'];

    public function paises(){
        return $this->belongsTo("App\Models\Paises");
    }

    
}
