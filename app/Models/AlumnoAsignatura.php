<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlumnoAsignatura extends Model
{
    use HasFactory;

    protected $fillable = ['id_asignatura', 'id_alumno', 'nota'];
}
