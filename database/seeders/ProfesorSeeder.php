<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Profesor;
use App\Models\User;

class ProfesorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user1 = User::create([
            'name'=>'Antonio Gutierrez',
            'email'=>'antoniogutierrezprof@educationweb.com',
            'password'=>bcrypt('antonio')
        ])->assignRole('profesor');

        $profesor1 = Profesor::create([
            'name'=>'Antonio Gutierrez',
            'direccion'=>'C/Fray Ceferino, 55, 6º B',
            'telefono'=>'693 58 21 47',
            'user_id'=>'3'
        ]);

        $user2 = User::create([
            'name'=>'Pedro Suarez',
            'email'=>'pedrosuarezprof@educationweb.com',
            'password'=>bcrypt('pedro')
        ])->assignRole('profesor');

        $profesor2 = Profesor::create([
            'name'=>'Pedro Suarez',
            'direccion'=>'Plaza Primo de Rivera, 34, 5º D',
            'telefono'=>'145 32 89 74',
            'user_id'=>'4'
        ]);
    }
}
