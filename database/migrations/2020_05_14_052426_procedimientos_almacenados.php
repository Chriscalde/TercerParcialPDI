<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class ProcedimientosAlmacenados extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $crear_curso = 'CREATE PROCEDURE `crearNuevoCurso` (
            IN `nuevoNombre` varchar(45), 
            IN `nuevaFechaAlta` datetime,
            IN `nuevaFechaBaja` datetime,
            IN `nuevoVigente` boolean
            )
        BEGIN
            INSERT INTO catCursos (nombreCurso, fechaAlta, fechaBaja, vigente)
            VALUES (nuevoNombre, nuevaFechaAlta, nuevaFechaBaja, nuevoVigente);
        END
    ';
        DB::unprepared('DROP PROCEDURE IF EXISTS crearNuevoCurso;');
        DB::unprepared($crear_curso);

        $editar_curso = 'CREATE PROCEDURE `editarCurso` (
            IN `idCursoEditar` int,
            IN `nuevoNombre` varchar(45), 
            IN `nuevaFechaAlta` datetime,
            IN `nuevaFechaBaja` datetime,
            IN `nuevoVigente` boolean
            )
        BEGIN
            UPDATE catCursos SET 
            nombreCurso = nuevoNombre,
            fechaAlta = nuevaFechaAlta,
            fechaBaja = nuevaFechaBaja,
            vigente = nuevoVigente
            WHERE idCurso = idCursoEditar;
        END';
        DB::unprepared('DROP PROCEDURE IF EXISTS editarCurso;');
        DB::unprepared($editar_curso);    

        $leer_curso = '
        CREATE PROCEDURE `leerCursos` ()
            BEGIN
                SELECT 
                *
                FROM
                catCursos;
            END';
        DB::unprepared('DROP PROCEDURE IF EXISTS leerCursos;');
        DB::unprepared($leer_curso);

        $eliminar_curso = 'CREATE PROCEDURE `eliminarCurso` (
            IN `idCursoEliminar` int
        )
        BEGIN
            DELETE FROM catCursos
            WHERE idCurso = idCursoEliminar;
        END';
        DB::unprepared('DROP PROCEDURE IF EXISTS eliminarCurso;');
        DB::unprepared($eliminar_curso);

        $crear_maestro = 'CREATE PROCEDURE `crearNuevoMaestro` (
            IN `nuevaMatricula` int, 
            IN `nuevoPaterno` varchar(45),
            IN `nuevoMaterno` varchar(45),
            IN `nuevoNombre` varchar(45),
            IN `nuevoCurp` varchar(45),
            IN `nuevoGradoAca` int
            )
        BEGIN
            INSERT INTO datMaestro (matricula, paterno, materno, nombre, curp, idGradoAca)
            VALUES (nuevaMatricula, nuevoPaterno, nuevoMaterno, nuevoNombre, nuevoCurp, nuevoGradoAca);
        END';

        DB::unprepared('DROP PROCEDURE IF EXISTS crearNuevoMaestro;');
        DB::unprepared($crear_maestro);

        $editar_maestro = 'CREATE PROCEDURE `editarMaestro` (
            IN `idMaestroEditar` int,
            IN `nuevaMatricula` int, 
            IN `nuevoPaterno` varchar(45),
            IN `nuevoMaterno` varchar(45),
            IN `nuevoNombre` varchar(45),
            IN `nuevoCurp` varchar(45),
            IN `nuevoGradoAca` int
            )
        BEGIN
            UPDATE datMaestro SET 
            matricula = nuevaMatricula,
            paterno = nuevoPaterno,
            materno = nuevoMaterno,
            nombre = nuevoNombre,
            curp = nuevoCurp,
            idGradoAca = nuevoGradoAca
            WHERE idMaestro = idMaestroEditar;
        END';
        DB::unprepared('DROP PROCEDURE IF EXISTS editarMaestro;');
        DB::unprepared($editar_maestro);

        $leer_maestro = 'CREATE PROCEDURE `leerMaestros` ()
        BEGIN
            SELECT 
            *
            FROM
            datMaestro;
        END';
        DB::unprepared('DROP PROCEDURE IF EXISTS leerMaestros;');
        DB::unprepared($leer_maestro);

        $eliminar_maestro = 'CREATE PROCEDURE `eliminarMaestro` (
            IN `idMaestroEliminar` int
        )
        BEGIN
            DELETE FROM datMaestro
            WHERE idMaestro = idMaestroEliminar;
        END';
        DB::unprepared('DROP PROCEDURE IF EXISTS eliminarMaestro;');
        DB::unprepared($eliminar_maestro);

        $crear_maestro_curso = 'CREATE PROCEDURE `crearNuevoMaestroCurso` (
            IN `nuevoMaestro` int, 
            IN `nuevoCurso` int 
            )
        BEGIN
            INSERT INTO relMaestroCurso (idMaestro, idCurso)
            VALUES (nuevoMaestro, nuevoCurso);
        END';
        DB::unprepared('DROP PROCEDURE IF EXISTS crearNuevoMaestroCurso;');
        DB::unprepared($crear_maestro_curso);

        $editar_maestro_curso = 'CREATE PROCEDURE `editarMaestroCurso` (
            IN `idMaestroCursoEditar` int,
            IN `nuevoMaestro` int, 
            IN `nuevoCurso` int 
            )
        BEGIN
            UPDATE relMaestroCurso SET 
            idMaestro = nuevoMaestro,
            idCurso = nuevoCurso
            WHERE idMaestroCurso = idMaestroCursoEditar;
        END';
        DB::unprepared('DROP PROCEDURE IF EXISTS editarMaestroCurso;');
        DB::unprepared($editar_maestro_curso);

        $leer_maestro_curso = 'CREATE PROCEDURE `leerMaestroCurso` ()
        BEGIN
            SELECT 
            *
            FROM
            relMaestroCurso;
        END';
        DB::unprepared('DROP PROCEDURE IF EXISTS leerMaestroCurso;');
        DB::unprepared($leer_maestro_curso);

        $eliminar_maestro_curso = 'CREATE PROCEDURE `eliminarMaestroCurso` (
            IN `idMaestroCursoEliminar` int
        )
        BEGIN
            DELETE FROM relMaestroCurso 
            WHERE idMaestroCurso = idMaestroCursoEliminar;
        END';
        DB::unprepared('DROP PROCEDURE IF EXISTS eliminarMaestroCurso;');
        DB::unprepared($eliminar_maestro_curso);

        $leer_grado_academico = 'CREATE PROCEDURE `leerGradoAcademico` ()
        BEGIN
            SELECT 
            *
            FROM
            catGradoAcademico;
        END';
        DB::unprepared('DROP PROCEDURE IF EXISTS leerGradoAcademico;');
        DB::unprepared($leer_grado_academico);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP PROCEDURE IF EXISTS leerGradoAcademico;');
        DB::unprepared('DROP PROCEDURE IF EXISTS eliminarMaestroCurso;');
        DB::unprepared('DROP PROCEDURE IF EXISTS leerMaestroCurso;');
        DB::unprepared('DROP PROCEDURE IF EXISTS editarMaestroCurso;');
        DB::unprepared('DROP PROCEDURE IF EXISTS crearNuevoMaestroCurso;');
        DB::unprepared('DROP PROCEDURE IF EXISTS eliminarMaestro;');
        DB::unprepared('DROP PROCEDURE IF EXISTS leerMaestros;');
        DB::unprepared('DROP PROCEDURE IF EXISTS editarMaestro;');
        DB::unprepared('DROP PROCEDURE IF EXISTS crearNuevoMaestro;');
        DB::unprepared('DROP PROCEDURE IF EXISTS eliminarCurso;');
        DB::unprepared('DROP PROCEDURE IF EXISTS leerCursos;');
        DB::unprepared('DROP PROCEDURE IF EXISTS editarCurso;');
        DB::unprepared('DROP PROCEDURE IF EXISTS crearNuevoCurso;');
    }
}
