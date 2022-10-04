<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('autores', function (Blueprint $table) {
            $table->id();
            $table->string('nome',100);
            $table->date('dataNascimento');
            $table->string('cpf',14);
            $table->bigInteger('genero_id')->unsigned()->nullable();
            $table->foreign('genero_id')->references('id')->on('generos');
            $table->bigInteger('nacionalidade_id')->unsigned()->nullable();
            $table->foreign('nacionalidade_id')->references('id')->on('nacionalidades');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('autores');
    }
};
