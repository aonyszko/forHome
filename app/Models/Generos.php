<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Generos extends Model
{
    use HasFactory;

    protected $table = "generos";
    protected $fillable = ['genero'];

    public function autores(){
        return $this->hasMany("App\Models\Autores");
    }

}
