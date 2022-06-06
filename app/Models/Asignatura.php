<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asignatura extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'profesor'];

    public function alumnos(){
        return $this->belongsToMany(Alumno::class)->withPivot("nota")->ondelete("cascade");
    }
}
