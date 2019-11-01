<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDatabase extends Migration
{
      /**
       * Run the migrations.
       *
       * @return void
       */
      public function up()
      {
            Schema::create('tipos_usuarios', function (Blueprint $table) {
                  $table->increments('id');
                  $table->string('nombre', 30);
            });

            Schema::create('tipos_contratos', function (Blueprint $table) {
                  $table->increments('id');
                  $table->string('nombre', 15);
            });

            Schema::create('tipos_programas', function (Blueprint $table) {
                  $table->increments('id');
                  $table->string('nombre', 30);
            });

            Schema::create('tipos_salones', function (Blueprint $table) {
                  $table->increments('id');
                  $table->string('nombre', 30);
            });

            Schema::create('modalidades', function (Blueprint $table) {
                  $table->increments('id');
                  $table->string('nombre', 30);
            });

            Schema::create('jornadas', function (Blueprint $table) {
                  $table->increments('id');
                  $table->time('hora_inicio');
                  $table->time('hora_fin');
            });

            Schema::create('jornadas_academicas', function (Blueprint $table) {
                  $table->increments('id');
                  $table->string('nombre', 15);
            });

            Schema::create('dias', function (Blueprint $table) {
                  $table->increments('id');
                  $table->string('nombre', 15);
            });

            Schema::create('periodos_academicos', function (Blueprint $table) {
                  $table->increments('id');
                  $table->year('año');
                  $table->integer('periodo')->unsigned();
            });

            Schema::create('frecuencias_horarias', function (Blueprint $table) {
                  $table->increments('id');
                  $table->string('nombre', 20);
            });

            Schema::create('asignaturas', function (Blueprint $table) {
                  $table->increments('id');
                  $table->string('codigo', 15)->unique();
                  $table->string('nombre', 50);
                  $table->integer('creditos')->unsigned();
            });

            Schema::create('sedes', function (Blueprint $table) {
                  $table->increments('id');
                  $table->string('nombre', 30);
                  $table->string('direccion', 100);
            });

            Schema::create('subsedes', function (Blueprint $table) {
                  $table->increments('id');
                  $table->string('nombre', 30);
                  $table->string('direccion', 100);
            });

            Schema::create('salones', function (Blueprint $table) {
                  $table->increments('id');
                  $table->string('nombre', 20);
                  $table->integer('capacidad')->unsigned();
                  $table->integer('id_sede')->unsigned();
                  $table->integer('id_subsede')->unsigned()->nullable();
                  $table->integer('id_tipo_salon')->unsigned();
                  $table->foreign('id_sede')
                        ->references('id')->on('sedes')
                        ->onDelete('cascade');
                  $table->foreign('id_subsede')
                        ->references('id')->on('subsedes')
                        ->onDelete('cascade');
                  $table->foreign('id_tipo_salon')
                        ->references('id')->on('tipos_salones')
                        ->onDelete('cascade');
            });

            Schema::create('users', function (Blueprint $table) {
                  $table->increments('id');
                  $table->integer('identificacion')->unique()->unsigned();
                  $table->string('nombres', 30);
                  $table->string('apellidos', 30);
                  $table->integer('telefono')->unsigned();
                  $table->string('email', 50);
                  $table->text('password');
                  $table->integer('id_tipo_usuario')->unsigned()->nullable();
                  $table->integer('id_tipo_contrato')->nullable()->unsigned();
                  $table->rememberToken();
                  $table->foreign('id_tipo_usuario')
                        ->references('id')->on('tipos_usuarios')
                        ->onDelete('cascade');
                  $table->foreign('id_tipo_contrato')
                        ->references('id')->on('tipos_contratos')
                        ->onDelete('cascade');
            });

            Schema::create('facultades', function (Blueprint $table) {
                  $table->increments('id');
                  $table->string('nombre', 50);
                  $table->text('descripcion')->nullable();
                  $table->integer('id_decano')->unsigned()->nullable();
                  $table->foreign('id_decano')
                        ->references('id')->on('users')
                        ->onDelete('cascade');
            });

            Schema::create('programas', function (Blueprint $table) {
                  $table->increments('id');
                  $table->integer('snies')->unique()->unsigned()->nullable();
                  $table->string('nombre', 100);
                  $table->text('descripcion')->nullable();
                  $table->integer('duracion')->unsigned();
                  $table->integer('id_director')->unsigned()->nullable();
                  $table->integer('id_modalidad')->unsigned();
                  $table->integer('id_facultad')->unsigned();
                  $table->integer('id_tipo_programa')->unsigned();
                  $table->foreign('id_director')
                        ->references('id')->on('users')
                        ->onDelete('cascade');
                  $table->foreign('id_modalidad')
                        ->references('id')->on('modalidades')
                        ->onDelete('cascade');
                  $table->foreign('id_facultad')
                        ->references('id')->on('facultades')
                        ->onDelete('cascade');
                  $table->foreign('id_tipo_programa')
                        ->references('id')->on('tipos_programas')
                        ->onDelete('cascade');
            });

            Schema::create('grupos', function (Blueprint $table) {
                  $table->increments('id');
                  $table->string('nombre', 10);
                  $table->integer('id_programa')->unsigned();
                  $table->integer('id_jornada_academica')->unsigned();
                  $table->integer('id_sede')->unsigned();
                  $table->foreign('id_jornada_academica')
                        ->references('id')->on('jornadas_academicas')
                        ->onDelete('cascade');
                  $table->foreign('id_programa')
                        ->references('id')->on('programas')
                        ->onDelete('cascade');
                  $table->foreign('id_sede')
                        ->references('id')->on('sedes')
                        ->onDelete('cascade');
            });

            Schema::create('horarios_detalles', function (Blueprint $table) {
                  $table->increments('id');
                  $table->integer('id_asignatura')->unsigned();
                  $table->integer('id_docente')->unsigned();
                  $table->integer('id_periodo')->unsigned();
                  $table->foreign('id_asignatura')
                        ->references('id')->on('asignaturas')
                        ->onDelete('cascade');
                  $table->foreign('id_docente')
                        ->references('id')->on('users')
                        ->onDelete('cascade');
                  $table->foreign('id_periodo')
                        ->references('id')->on('periodos_academicos')
                        ->onDelete('cascade');
            });

            Schema::create('horarios_dias', function (Blueprint $table) {
                  $table->increments('id');
                  $table->time('hora');
                  $table->decimal('cantidad_horas')->unsigned();
                  $table->integer('id_dia')->unsigned();
                  $table->integer('id_salon')->nullable()->unsigned();
                  $table->integer('id_frecuencia')->unsigned();
                  $table->integer('id_horario_detalle')->unsigned();
                  $table->foreign('id_dia')
                        ->references('id')->on('dias')
                        ->onDelete('cascade');
                  $table->foreign('id_salon')
                        ->references('id')->on('salones')
                        ->onDelete('cascade');
                  $table->foreign('id_frecuencia')
                        ->references('id')->on('frecuencias_horarias')
                        ->onDelete('cascade');
                  $table->foreign('id_horario_detalle')
                        ->references('id')->on('horarios_detalles')
                        ->onDelete('cascade');
            });

            Schema::create('grupos_horarios', function (Blueprint $table) {
                  $table->integer('id_grupo')->unsigned();
                  $table->integer('id_horario_detalle')->unsigned();
                  $table->integer('cantidad_estudiantes')->unsigned();
                  $table->primary(['id_grupo', 'id_horario_detalle']);
                  $table->foreign('id_grupo')
                        ->references('id')->on('grupos')
                        ->onDelete('cascade');
                  $table->foreign('id_horario_detalle')
                        ->references('id')->on('horarios_detalles')
                        ->onDelete('cascade');
            });

            Schema::create('disponibilidades_docentes', function (Blueprint $table) {
                  $table->increments('id');
                  $table->integer('id_docente')->unsigned();
                  $table->integer('id_periodo')->unsigned();
                  $table->foreign('id_docente')
                        ->references('id')->on('users')
                        ->onDelete('cascade');
                  $table->foreign('id_periodo')
                        ->references('id')->on('periodos_academicos')
                        ->onDelete('cascade');
            });

            Schema::create('disponibilidades_dias', function (Blueprint $table) {
                  $table->integer('id_dispo')->unsigned();
                  $table->integer('id_jornada')->unsigned();
                  $table->integer('id_dia')->unsigned();
                  $table->boolean('disponible');
                  $table->primary(['id_dispo', 'id_jornada', 'id_dia']);
                  $table->foreign('id_dispo')
                        ->references('id')->on('disponibilidades_docentes')
                        ->onDelete('cascade');
                  $table->foreign('id_jornada')
                        ->references('id')->on('jornadas')
                        ->onDelete('cascade');
                  $table->foreign('id_dia')
                        ->references('id')->on('dias')
                        ->onDelete('cascade');
            });

            Schema::create('docentes_asignaturas', function (Blueprint $table) {
                  $table->integer('id_docente')->unsigned();
                  $table->integer('id_asignatura')->unsigned();
                  $table->primary(['id_docente', 'id_asignatura']);
                  $table->foreign('id_docente')
                        ->references('id')->on('users')
                        ->onDelete('cascade');
                  $table->foreign('id_asignatura')
                        ->references('id')->on('asignaturas')
                        ->onDelete('cascade');
            });

            Schema::create('asignaturas_compartidas', function (Blueprint $table) {
                  $table->integer('id_horario')->unsigned();
                  $table->integer('id_asignatura')->unsigned();
                  $table->primary(['id_horario', 'id_asignatura']);
                  $table->foreign('id_horario')
                        ->references('id')->on('horarios_detalles')
                        ->onDelete('cascade');
                  $table->foreign('id_asignatura')
                        ->references('id')->on('asignaturas')
                        ->onDelete('cascade');
            });

            Schema::create('password_resets', function (Blueprint $table) {
                  $table->string('email')->index();
                  $table->string('token');
                  $table->timestamp('created_at')->nullable();
            });
      }

      /**
       * Reverse the migrations.
       *
       * @return void
       */
      public function down()
      {
            Schema::dropIfExists('asignaturas_compartidas');
            Schema::dropIfExists('docentes_asignaturas');
            Schema::dropIfExists('disponibilidades_dias');
            Schema::dropIfExists('disponibilidades_docentes');
            Schema::dropIfExists('grupos_horarios');
            Schema::dropIfExists('horarios_dias');
            Schema::dropIfExists('horarios_detalles');
            Schema::dropIfExists('grupos');
            Schema::dropIfExists('programas');
            Schema::dropIfExists('facultades');
            Schema::dropIfExists('users');
            Schema::dropIfExists('salones');
            Schema::dropIfExists('sedes');
            Schema::dropIfExists('subsedes');
            Schema::dropIfExists('tipos_salones');
            Schema::dropIfExists('tipos_usuarios');
            Schema::dropIfExists('tipos_contratos');
            Schema::dropIfExists('frecuencias_horarias');
            Schema::dropIfExists('periodos_academicos');
            Schema::dropIfExists('dias');
            Schema::dropIfExists('modalidades');
            Schema::dropIfExists('tipos_programas');
            Schema::dropIfExists('asignaturas');
            Schema::dropIfExists('jornadas');
            Schema::dropIfExists('jornadas_academicas');
            Schema::dropIfExists('password_resets');
      }
}
