<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearDatosMaestro extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datMaestro', function (Blueprint $table) {
            $table->bigIncrements('idMaestro');
            $table->integer('matricula');
            $table->string('paterno');
            $table->string('materno');
            $table->string('nombre');
            $table->string('curp');
        });

        Schema::table('datMaestro', function (Blueprint $table){
            $table->unsignedBigInteger('idGradoAca');
            $table->foreign('idGradoAca')->references('idGradoAca')->on('catGradoAcademico');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('datMaestro', function (Blueprint $table) {
            Schema::drop('datMaestro');
        });
    }
}
