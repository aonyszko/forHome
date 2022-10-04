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
        Schema::table('dicas', function (Blueprint $table) {
            $table->bigInteger('autores_id')->unsigned()->nullable();
            $table->foreign('autores_id')->references('id')->on('autores');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('dicas', function (Blueprint $table) {
            //
        });
    }
};
