<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Alumno;
use App\Models\User;

class AlumnoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alumnos = Alumno::all();
        return view('admin.alumnos.list_alumnos',compact("alumnos"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $alumno = new Alumno;
        $user = new User;
        $title = __("Alta alumno");
        $textButton = __("Añadir");
        $route = route("admin.alumnos.store");
        return view("admin.alumnos.create", compact("title", "textButton", "route", "alumno","user"));
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
            "name" => "required",
            "direccion" => "required|string|min:10",
            "nombre_tutor" => "required|string",
            "email" => "required|string|email|max:255",
            "password" => "required|string|min:8"
        ]);
        $user = User::create($request->only("name","email","password"))->assignRole('alumno');
        $user->alumno()->create($request->only("name","direccion","nombre_tutor"));
        
        return redirect(route("admin.alumnos.index"))
        ->with("success",__("Alumno dado de alta correctamente"));
    }

    /**'
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
    public function edit(Alumno $alumno, User $user)
    {
        $update = true;
        $title = __("Editar Alumno");
        $textButton = __("Actualizar");
        $route = route("admin.alumnos.update", ["alumno" => $alumno,"user" => $user]);
        return view("admin.alumnos.edit", compact("update","title","textButton","route","alumno","user"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Alumno $alumno, User $user)
    {
        $this->validate($request, [
            "name" => "required",
            "direccion" => "nullable|string|min:10",
            "nombre_tutor" => "nullable|string",
            "email" => "required|string|email|max:255",
        ]);
        $user->fill($request->only("email"))->save();
        $alumno->fill($request->only("name", "direccion","nombre_tutor"))->save();
        return redirect(route("admin.alumnos.index"))
        ->with("success",__("Alumno actualizado!"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Alumno $alumno)
    {
        $alumno->delete();
        return back()->with("success",__("Alumno dado de baja correctamente"));
    }
}

