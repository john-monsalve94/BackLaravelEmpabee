@php
    $municipios = App\Models\Municipio::all();
    $identificaciones = App\Models\TipoIdentificacion::all();
    $generos = App\Enums\Genero::getValues();
@endphp



<x-guest-layout>

    <script src="https://cdn.tailwindcss.com"></script>
    <form class="bg-amber-200 text-black" method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
        @csrf

        <!-- Primer nombre -->
        <div>
            <x-input-label for="first-name" :value="__('Primer nombre')" />
            <x-text-input id="first-name" class="block mt-1 w-full" type="text" name="primer_nombre" :value="old('first-name')"
                required autofocus autocomplete="primer_nombre" />
            <x-input-error :messages="$errors->get('primer_nombre')" class="mt-2" />
        </div>

        <!-- Segundo nombre -->

        {{-- <div class="mt-4">
            <x-input-label for="second-name" :value="__('Segundo nombre')" />
            <x-text-input id="second-name" class="block mt-1 w-full" type="text" name="segundo_nombre" :value="old('second-name')"
                autofocus autocomplete="segundo_nombre" />
            <x-input-error :messages="$errors->get('segundo_nombre')" class="mt-2" />
        </div> --}}

        <!-- Primer apellido -->

        <div class="mt-4">
            <x-input-label for="first-surname" :value="__('Primer apellido')" />
            <x-text-input id="first-surname" class="block mt-1 w-full" type="text" name="primer_apellido"
                :value="old('first-surname')" required autofocus autocomplete="primer_apellido" />
            <x-input-error :messages="$errors->get('primer_apellido')" class="mt-2" />
        </div>

        <!-- Segundo apellido -->

        <div class="mt-4">
            <x-input-label for="second-surname" :value="__('Segundo apellido')" />
            <x-text-input id="second-surname" class="block mt-1 w-full" type="text" name="segundo_apellido"
                :value="old('second-surname')" autofocus autocomplete="segundo_apellido" />
            <x-input-error :messages="$errors->get('segundo_apellido')" class="mt-2" />
        </div>

        <!-- Género -->

        <div class="mt-4">
            <x-input-label for="genero" :value="__('Género')" />
            <select name="" id="genero" class="rounded-md mt-1 w-full " required>
                <option value="" class="bg-amber-300">------------Seleccione un genero------------</option>

                @foreach ($generos as $genero)
                    <option value="{{ $genero }}" class="bg-amber-300">
                        {{ $genero }}
                    </option>
                @endforeach

            </select>
        </div>

        {{-- <x-text-input id="genero" class="block mt-1 w-full" type="" name="genero" :value="old('genero')"
                required autofocus autocomplete="genero" />  <x-input-error :messages="$errors->get('genero')" class="mt-2" />
            {{-- </div>  --}}


        <!-- Telefono -->

        <div class="mt-4">
            <x-input-label for="telefono" :value="__('Teléfono')" />
            <x-text-input id="telefono" class="block mt-1 w-full" type="text" name="telefono" :value="old('telefono')"
                required autofocus autocomplete="telefono" />
            <x-input-error :messages="$errors->get('telefono')" class="mt-2" />
        </div>

        <!-- Tipo de Identificación -->

        <div class="mt-4">
            <x-input-label for="Tipoidentficacion" :value="__('Tipo de Identficación')" />
            <select name="tipo_identificacions_id" id="genero" class="rounded-md mt-1 w-full " required>
                <option value="" class="bg-amber-300">------------Seleccione una opción------------</option>
                @foreach ($identificaciones as $identificacion)
                    <option value="{{ $identificacion->id }}" class="bg-amber-300">
                        {{ $identificacion->nombre_identificacion }}
                    </option>
                @endforeach
            </select>
        </div>



        <!-- Identificación -->

        <div class="mt-4">
            <x-input-label for="identificacion" :value="__('Identificación')" />
            <x-text-input id="identificacion" class="block mt-1 w-full" type="text" name="numero_identficacion"
                :value="old('identificacion')" required autofocus autocomplete="numero_identficacion" />
            <x-input-error :messages="$errors->get('numero_identficacion')" class="mt-2" />
        </div>



        <!-- Municipio Nacimiento -->

        <div class="mt-4">
            <x-input-label for="muni_nacimiento" :value="__('Municipio de Nacimiento')" />
            <select name="municipio_nacimiento_id" id="muni_nacimiento" class="rounded-md mt-1 w-full " required>
                <option value="" class="bg-amber-300">------------Seleccione una opción------------</option>

                @foreach ($municipios as $municipio)
                    <option value="{{ $municipio->id }}" class="bg-amber-300">{{ $municipio->nombre_municipio }}
                    </option>
                @endforeach

            </select>
        </div>


        <!-- Municipio Residencia -->

        <div class="mt-4">
            <x-input-label for="muni_residencia" :value="__('Municipio de Residencia')" />
            <select name="municipio_residencia_id" id="muni_residencia" class="rounded-md mt-1 w-full " required>
                <option value="" class="bg-amber-300">------------Seleccione una opción------------</option>

                @foreach ($municipios as $municipio)
                    <option value="{{ $municipio->id }}" class="bg-amber-300">{{ $municipio->nombre_municipio }}
                    </option>
                @endforeach
            </select>
        </div>


        <!-- Foto -->
        {{--
        <div class="mt-4">
            <x-input-label for="foto" :value="__('Foto de perfil')" />
            <x-text-input id="foto" class="block mt-1 w-full bg-amber-400 border-2 border-white" type="file"
                name="foto" :value="old('foto')" required autofocus autocomplete="foto" />
            <x-input-error :messages="$errors->get('foto')" class="mt-2" />
        </div> --}}

        {{-- <div class="mt-4">
            <x-input-label for="foto" :value="__('Foto de perfil')" />
            <input id="foto" class="block mt-1 w-full bg-amber-400 border-2 border-white" type="file"
                name="foto" required autofocus autocomplete="foto" />
            <x-input-error :messages="$errors->get('foto')" class="mt-2" />
        </div> --}}


        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Correo Electrónico')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                required autocomplete="email" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Contraseña')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->

        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirmar Contraseña')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                href="{{ route('login') }}">
                {{ __('Ya estás registrado ?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
