<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlumnoAsignaturaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumno_asignaturas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_asignatura');   
            $table->foreign('id_asignatura')
                  ->references('id')
                  ->on('asignaturas')
                  ->onDelete('cascade');
            $table->unsignedBigInteger('id_alumno');
            $table->foreign('id_alumno')
                  ->references('id')
                  ->on('alumnos')
                  ->onDelete('cascade');

            $table->string('nota')->nullable();
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
        Schema::dropIfExists('alumno_asignatura');
    }
}
