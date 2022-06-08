<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Alumno;
use App\Models\User;

class AlumnoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user1 = User::create([
            'name'=>'Miguel Fernández',
            'email'=>'miguelfernandezalum@educationweb.com',
            'password'=>bcrypt('miguel')
        ])->assignRole('alumno');

        $alumno1 = Alumno::create([
            'name'=>'Miguel Fernández',
            'direccion'=>'C/General Elorza, 24, 1º B',
            'nombre_tutor'=>'Miguel',
            'user_id'=>'2'
        ]);
    }
}
