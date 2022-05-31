<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Nota;
use App\Models\Asignatura;
use App\Models\Alumno;

class NotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notas = Nota::all();
        $asignaturas = Asignatura::all();
        $alumnos = Alumno::all();
        return view('admin.notas.list_notas',compact("notas","asignaturas","alumnos"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $nota = new Nota;
        $title = __("Alta Asignatura-Alumno");
        $textButton = __("Añadir");     
        $route = route("admin.notas.store");
        $asignaturas = Asignatura::all();
        $alumnos = Alumno::all();
        return view("admin.notas.create", compact("title", "textButton", "route", "nota","asignaturas","alumnos"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            "id_asignatura" => "required",
            "id_alumno" => "required"
        ]);
        Nota::create($request->only("id_asignatura","id_alumno"));
        
        return redirect(route("admin.notas.index"))
        ->with("success",__("Asignatura-Alumno dado de alta correctamente"));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Nota $nota)
    {
        $update = true;
        $title = __("Editar Notas");
        $textButton = __("Actualizar");
        $route = route("admin.notas.update", ["nota" => $nota]);
        return view("admin.notas.edit", compact("update","title","textButton","route","nota"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Nota $nota)
    {
        $this->validate($request, [
            "id_asignatura" => "required",
            "id_alumno" => "required"
        ]);
        $nota->fill($request->only("id_asignatura", "id_alumno"))->save();
        return redirect(route("admin.notas.index"))
        ->with("success",__("Asignatura-Alumno actualizado!"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Nota $nota)
    {
        $nota->delete();
        return back()->with("success",__("Nota dada de baja correctamente"));
    }
}
