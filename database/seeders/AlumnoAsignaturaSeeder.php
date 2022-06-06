<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AlumnoAsignatura;

class AlumnoAsignaturaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $nota1 = AlumnoAsignatura::create([
            'id_asignatura'=>'1',
            'id_alumno'=>'1',
            'nota'=>'6'
        ]);

        $nota2 = Alumnoasignatura::create([
            'id_asignatura'=>'2',
            'id_alumno'=>'1',
            'nota'=>'7'
        ]);
    }
}
