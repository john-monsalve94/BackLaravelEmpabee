<x-guest-layout>
    <script src="https://cdn.tailwindcss.com"></script>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Fist Name -->
        <div>
            <x-input-label for="first-name" :value="__('Primer Nombre')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="first-name" :value="old('first-name')" required
                autofocus autocomplete="first-name" />
            <x-input-error :messages="$errors->get('firt-name')" class="mt-2" />
        </div>

        <!-- Second name -->

        <div>
            <x-input-label for="second-name" :value="__('Segundo Nombre')" />
            <x-text-input id="second-name" class="block mt-1 w-full" type="text" name="second-name" :value="old('second-name')"
                required autofocus autocomplete="second-name" />
            <x-input-error :messages="$errors->get('last-name')" class="mt-2" />
        </div>

        <!-- Second name -->


        <!-- First surname -->

        <div>
            <x-input-label for="first-surname" :value="__('Primer apellido')" />
            <x-text-input id="first-surname" class="block mt-1 w-full" type="text" name="first-surname" :value="old('first-surname')"
                required autofocus autocomplete="first-surname" />
            <x-input-error :messages="$errors->get('first-surname')" class="mt-2" />
        </div>

        <!-- First surname -->

        <!-- Second surname -->

        <div>
            <x-input-label for="second-surname" :value="__('Primer apellido')" />
            <x-text-input id="second-surname" class="block mt-1 w-full" type="text" name="second-surname" :value="old('second-surname')"
                required autofocus autocomplete="second-surname" />
            <x-input-error :messages="$errors->get('second-surname')" class="mt-2" />
        </div>

        <!-- Second surname -->

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Correo Electrónico')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                required autocomplete="username" />
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
