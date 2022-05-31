<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::create(['name' => 'admin']);
        $profesor = Role::create(['name' => 'profesor']);
        $alumno = Role::create(['name' => 'alumno']);

        Permission::create(['name' => 'admin.index'])->assignRole($admin);
        Permission::create(['name' => 'admin.users'])->assignRole($admin);
        Permission::create(['name' => 'admin.alumnos'])->assignRole($admin);
        Permission::create(['name' => 'admin.profesores'])->assignRole($admin);
        Permission::create(['name' => 'admin.asignaturas'])->assignRole($admin);
        Permission::create(['name' => 'admin.notas'])->assignRole($admin);

        Permission::create(['name' => 'admin.alumnos.index'])->assignRole($admin);
        Permission::create(['name' => 'admin.alumnos.create'])->assignRole($admin);
        Permission::create(['name' => 'admin.alumnos.edit'])->assignRole($admin);
        Permission::create(['name' => 'admin.alumnos.destroy'])->assignRole($admin);

        Permission::create(['name' => 'admin.profesores.index'])->assignRole($admin);
        Permission::create(['name' => 'admin.profesores.create'])->assignRole($admin);
        Permission::create(['name' => 'admin.profesores.edit'])->assignRole($admin);
        Permission::create(['name' => 'admin.profesores.destroy'])->assignRole($admin);

        Permission::create(['name' => 'admin.asignaturas.index'])->assignRole($admin);
        Permission::create(['name' => 'admin.asignaturas.create'])->assignRole($admin);
        Permission::create(['name' => 'admin.asignaturas.edit'])->assignRole($admin);
        Permission::create(['name' => 'admin.asignaturas.destroy'])->assignRole($admin);

        Permission::create(['name' => 'admin.notas.index'])->assignRole($admin);
        Permission::create(['name' => 'admin.notas.create'])->assignRole($admin);
        Permission::create(['name' => 'admin.notas.edit'])->assignRole($admin);
        Permission::create(['name' => 'admin.notas.destroy'])->assignRole($admin);
    }
}
