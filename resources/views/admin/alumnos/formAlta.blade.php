<!--<div class="w-full max-w-lg">
    <div class="flex flex-wrap ">
        <h1 class="mb-5 px-300">{{ $title }}</h1>
    </div>
</div>-->

<form class="w-full max-w-lg border-4" method="POST" action="{{ $route }}">
    @csrf
    @isset($update)
        @method("PUT")
    @endisset
     <h1 class="font-semibold py-5 text-blue mb-10 bg-blue-900 text-white px-5">{{ $title }} </h1>
     <div class="flex flex-wrap -mx-3 mb-6">
        <div class="w-full px-5">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold -my-1 mb-3" for="name">
                {{ __("Nombre Alumno") }}
            </label>
            <input name="name" value="{{ old('name') ?? $alumno->name }}" class="appearance-none block w-full bg-gray-300 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="nombre" type="text">
            <p class="text-gray-600 text-xs italic -my-3">{{ __("Nombre Alumno") }}</p>
            @error("name")
            <div class="border border-red-400 rounded-b bg-red-100 mt-1 px-4 py-3 text-red-700">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>

    <div class="flex flex-wrap -mx-3 mb-6">
        <div class="w-full px-5">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold -my-1 mb-3" for="direccion">
                {{ __("Direccion Alumno") }}
            </label>
            <input name="direccion" value="{{ old('direccion') ?? $alumno->direccion }}" class="appearance-none block w-full bg-gray-300 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="direccion" type="text">
            <p class="text-gray-600 text-xs italic -my-3">{{ __("Direccion Alumno") }}</p>
            @error("direccion")
            <div class="border border-red-400 rounded-b bg-red-100 mt-1 px-4 py-3 text-red-700">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>

    <div class="flex flex-wrap -mx-3 mb-6">
        <div class="w-full px-5">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold -my-1 mb-3" for="nombre_tutor">
                {{ __("Nombre Tutor/a") }}
            </label>
            <input name="nombre_tutor" value="{{ old('nombre_tutor') ?? $alumno->nombre_tutor }}" class="appearance-none block w-full bg-gray-300 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="nombre_tutor" type="text">
            <p class="text-gray-600 text-xs italic -my-3">{{ __("Nombre Tutor/a") }}</p>
            @error("nombre_tutor")
            <div class="border border-red-400 rounded-b bg-red-100 mt-1 px-4 py-3 text-red-700">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>
    
    <div class="flex flex-wrap -mx-3 mb-6">
        <div class="w-full px-5">
            <label for="email" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                {{ __('Direccion de correo electronico') }}:
            </label>

            <input id="email" type="email"
                class="form-input w-full @error('email') border-red-500 @enderror" name="email"
                value="{{ old('email') ?? $user->email }}" required autocomplete="email">

            @error('email')
            <p class="text-red-500 text-xs italic mt-4">
                {{ $message }}
            </p>
            @enderror
        </div>
    </div>

    <div class="flex flex-wrap -mx-3 mb-6">
        <div class="w-full px-5">
            <label for="password" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                {{ __('Contraseña') }}:
            </label>

            <input id="password" type="password"
                class="form-input w-full @error('password') border-red-500 @enderror" name="password"
                required autocomplete="new-password">

            @error('password')
            <p class="text-red-500 text-xs italic mt-4">
                {{ $message }}
            </p>
            @enderror
        </div>
    </div>

    <div class="md:flex md:items-center">
        <div class="md:w-1/3">
            <button class="shadow bg-teal-400 hover:bg-teal-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit">
                {{ $textButton }}
            </button>
        </div>
    </div>
</form>