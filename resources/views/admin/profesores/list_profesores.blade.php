@extends('adminlte::page')

@section('title', 'Profesores')

@section('content_header')
    <h1 class="text-center text-success">{{ __("Listado de profesores") }}</h1>
@stop

@section('content')
<a href="{{ route('admin.profesores.create') }}" class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
            {{ __("Añadir Profesor") }}
    </a>
    <table class="border-separate border-2 text-center border-gray-500 mt-3" style="width: 100%">
        <thead>
        <tr>
            <th class="px-4 py-2">{{ ("Nombre") }}</th>
            <th class="px-4 py-2">{{ ("Direccion") }}</th>
            <th class="px-4 py-2">{{ ("Telefono") }}</th>
            <th class="px-4 py-2">{{ ("Acciones") }}</th>
        </tr>
        </thead>
        <tbody>
            @forelse($profesores as $profesor)
                <tr>

                    <td class="border px-4 py-2">{{ $profesor->name }}</td>

                    <td class="border px-4 py-2">{{ $profesor->direccion }}</td>

                    <td class="border px-4 py-2">{{ $profesor->telefono }}</td>

                    <td class="border px-4 py-2">
                        <a href="{{ route('admin.profesores.edit', ['profesore' => $profesor]) }}" class="btn btn-primary text-blue-400">{{ __("Editar") }}</a>
                        <a
                            href="#"
                            class="btn btn-danger text-red-400"
                            onclick="event.preventDefault();
                                document.getElementById('delete-profesor-{{ $profesor->id }}-form').submit();"
                        >{{ __("Eliminar") }}
                        </a>
                        <form id="delete-profesor-{{ $profesor->id }}-form" action="{{ route('admin.profesores.destroy', ['profesore' => $profesor]) }}" method="POST" class="hidden">
                            @method("DELETE")
                            @csrf
                        </form>
                    </td>

                </tr>
            @empty
                <tr>
                    <td colspan="3">
                        <div class="bg-red-100 text-center border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                            <p><strong class="font-bold">{{ __("No hay profesores") }}</strong></p>
                            <span class="block sm:inline">{{ __("Todavía no hay nada que mostrar aquí") }}</span>
                        </div>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="mt-3">

    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
@stop

@section('js')
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script> console.log('Hi!'); </script>
@stop