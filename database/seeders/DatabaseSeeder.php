<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(AlumnoSeeder::class);
        $this->call(ProfesorSeeder::class);
        $this->call(AsignaturaSeeder::class);
        $this->call(AlumnoAsignaturaSeeder::class);
    }
}
