<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearRelacionMaestroCurso extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('relMaestroCurso',function(Blueprint $table){
            $table->bigIncrements('idMaestroCurso');
        });

        Schema::table('relMaestroCurso', function (Blueprint $table) {
            $table->unsignedBigInteger('idMaestro');
            $table->foreign('idMaestro')->references('idMaestro')->on('datMaestro');
            $table->unsignedBigInteger('idCurso');
            $table->foreign('idCurso')->references('idCurso')->on('catCursos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('relMaestroCurso', function (Blueprint $table) {
            Schema::drop('relMaestroCurso');
        });
    }
}
