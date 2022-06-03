<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Auth::routes();

Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/alumnos',[\App\Http\Controllers\AlumnoController::class, 'index'])->name('alumnos.index');

Route::get('/asignaturas',[\App\Http\Controllers\AsignaturaController::class, 'index'])->name('asignaturas.index');

Route::get('/notas',[\App\Http\Controllers\NotasController::class, 'show'])->name('notas.show');