<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nacionalidades extends Model
{
    use HasFactory;

    protected $table = "nacionalidades";
    protected $fillable = ['descNacionalidade'];

    public function autores(){
        return $this->hasMany("App\Models\Autores");
    }
}
