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
        Schema::create('receitas_paises', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('receitas_id')->unsigned()->nullable();
            $table->foreign('receitas_id')->references('id')->on('receitas');
            $table->bigInteger('paises_id')->unsigned()->nullable();
            $table->foreign('paises_id')->references('id')->on('paises');
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
        Schema::dropIfExists('receitas_paises');
    }
};
