<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearGradoAcademico extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('catGradoAcademico', function (Blueprint $table) {
            $table->bigIncrements('idGradoAca');
            $table->string('gradoAcademico');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('catGradoAcademico', function (Blueprint $table) {
            Schema::drop('catGradoAcademico');
        });
    }
}
