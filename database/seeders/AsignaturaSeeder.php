<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Asignatura;

class AsignaturaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $asignatura1 = Asignatura::create([
            'nombre'=>'Lengua',
            'profesor'=>2
        ]);

        $asignatura2 = Asignatura::create([
            'nombre'=>'Matematicas',
            'profesor'=>1
        ]);
    }
}
