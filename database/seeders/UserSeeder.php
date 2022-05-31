<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $usuarioAdmin = User::create([
            'name'=>'Barbara',
            'email'=>'barbara@gmail.com',
            'email_verified_at'=>now(),
            'password'=>bcrypt('barbara')
        ])->assignRole('admin');
    }
}
