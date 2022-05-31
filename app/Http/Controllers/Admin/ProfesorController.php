<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Profesor;
use App\Models\User;

class ProfesorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profesores = Profesor::all();
        return view('admin.profesores.list_profesores',compact("profesores"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $profesor = new Profesor;
        $user = new User;
        $title = __("Alta profesor");
        $textButton = __("Añadir");
        $route = route("admin.profesores.store");
        return view("admin.profesores.create", compact("title", "textButton", "route", "profesor","user"));
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
            "direccion" => "nullable|string|min:10",
            "telefono" => "nullable|string",
            "email" => "required|string|email|max:255",
            "password" => "required|string|min:8"
        ]);

        $user = User::create($request->only("name","email","password"))->assignRole('profesor');
        $user->profesor()->create($request->only("name","direccion","telefono"));

        return redirect(route("admin.profesores.index"))
        ->with("success",__("Profesor dado de alta correctamente"));
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
    public function edit(Profesor $profesor, User $user)
    {
        $update = true;
        $title = __("Editar Profesor");
        $textButton = __("Actualizar");
        $route = route("admin.profesores.update", ["profesor" => $profesor, "user" => $user]);
        return view("admin.profesores.edit", compact("update","title","textButton","route","profesor","user"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profesor $profesor, User $user)
    {
        $this->validate($request, [
            "name" => "required",
            "direccion" => "nullable|string|min:10",
            "telefono" => "nullable|string",
            "email" => "required|string|email|max:255",
        ]);
        $user->fill($request->only("email"))->save();
        $profesor->fill($request->only("name", "direccion","telefono"))->save();
        return redirect(route("admin.profesores.index"))
        ->with("success",__("Profesor actualizado!"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profesor $profesor)
    {
        $profesor->delete();
        return back()->with("success",__("Profesor dado de baja correctamente"));
    }
}
