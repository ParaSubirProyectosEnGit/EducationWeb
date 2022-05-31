<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Asignatura;
use App\Models\Profesor;

class AsignaturaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $asignaturas = Asignatura::all();
        $profesores = Profesor::all();
        return view('admin.asignaturas.list_asignaturas',compact("asignaturas","profesores"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $asignatura = new Asignatura;
        $title = __("Alta Asignatura");
        $textButton = __("Añadir");     
        $route = route("admin.asignaturas.store");
        $profesores = Profesor::all();
        return view("admin.asignaturas.create", compact("title", "textButton", "route", "asignatura", "profesores"));
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
            "nombre" => "required",
            "profesor" => "required",
        ]);
        Asignatura::create($request->only("nombre","profesor"));

        return redirect(route("admin.asignaturas.index"))
        ->with("success",__("Asignatura dada de alta correctamente"));
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
    public function edit(Asignatura $asignatura)
    {
        $update = true;
        $title = __("Editar Asignatura");
        $textButton = __("Actualizar");
        $route = route("admin.asignaturas.update", ["asignatura" => $asignatura]);
        $profesores = Profesor::all();
        return view("admin.asignaturas.edit", compact("update","title","textButton","route","asignatura","profesores"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Asignatura $asignatura)
    {
        $this->validate($request, [
            "nombre" => "required",
            "profesor" => "required",
        ]);
        $asignatura->fill($request->only("nombre", "profesor"))->save();
        return redirect(route("admin.asignaturas.index"))
        ->with("success",__("Asignatura actualizada!"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Asignatura $asignatura)
    {
        $asignatura->delete();
        return back()->with("success",__("Asignatura dado de baja correctamente"));
    }
}
