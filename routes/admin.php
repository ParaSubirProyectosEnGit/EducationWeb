<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AlumnoController;
use App\Http\Controllers\Admin\ProfesorController;
use App\Http\Controllers\Admin\AsignaturaController;
use App\Http\Controllers\Admin\AlumnoAsignaturaController;
//use App\Http\Controllers\Admin\NotaController;

Route::get('',[HomeController::class,'index'])->middleware('can:admin.index')->name('admin.index');

Route::resource('users',UserController::class)->middleware('can:admin.users')->names('admin.users');

Route::resource('alumnos',AlumnoController::class)->middleware('can:admin.alumnos')->names('admin.alumnos');

Route::resource('profesores',ProfesorController::class)->middleware('can:admin.profesores')->names('admin.profesores');

Route::resource('asignaturas',AsignaturaController::class)->middleware('can:admin.asignaturas')->names('admin.asignaturas');

Route::resource('notas',AlumnoAsignaturaController::class)->middleware('can:admin.notas')->names('admin.notas');

//Route::resource('notas',NotaController::class)->middleware('can:admin.notas')->names('admin.notas');