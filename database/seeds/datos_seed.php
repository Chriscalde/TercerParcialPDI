<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class datos_seed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('catCursos')->insert([
            'nombreCurso'=>'Curso A',
            'fechaAlta'=>Carbon::now(),
            'fechaBaja'=>Carbon::now()->addDays(30),
            'vigente'=>true
        ]);

        DB::table('catCursos')->insert([
            'nombreCurso'=>'Curso B',
            'fechaAlta'=>Carbon::now()->addDays(15),
            'fechaBaja'=>Carbon::now()->addDays(30),
            'vigente'=>false
        ]);

        DB::table('catCursos')->insert([
            'nombreCurso'=>'Curso B',
            'fechaAlta'=>Carbon::now()->addDays(15),
            'fechaBaja'=>Carbon::now()->addDays(30),
            'vigente'=>false
        ]);

        DB::table('datMaestro')->insert([
            'matricula'=>rand(0,1000),
            'paterno'=>'Calderón',
            'materno'=>'Ortega',
            'nombre'=>'Christian',
            'curp'=>'CAOC980906HCHLRH01',
            'idGradoAca'=>12
        ]);

        DB::table('datMaestro')->insert([
            'matricula'=>rand(0,1000),
            'paterno'=>'Calderón',
            'materno'=>'Ortega',
            'nombre'=>'Gabriel',
            'curp'=>'CAOG060511HCHLRB01',
            'idGradoAca'=>4
        ]);

        DB::table('relMaestroCurso')->insert([
            'idMaestro'=>1,
            'idCurso'=>1
        ]);

        DB::table('relMaestroCurso')->insert([
            'idMaestro'=>1,
            'idCurso'=>2
        ]);

        DB::table('relMaestroCurso')->insert([
            'idMaestro'=>2,
            'idCurso'=>3
        ]);


    }
}
