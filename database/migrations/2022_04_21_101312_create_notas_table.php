<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_asignatura');
            $table->unsignedBigInteger('id_alumno');
            $table->string('nota')->nullable();
            $table->foreign('id_asignatura')
                  ->references('id')
                  ->on('asignaturas');
            $table->foreign('id_alumno')
                  ->references('id')
                  ->on('alumnos');

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
        Schema::dropIfExists('notas');
    }
}
