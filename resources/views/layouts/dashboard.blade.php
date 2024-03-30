@php
    $user = auth()->user();
@endphp
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css'])
    <x-tab-icon></x-tab-icon>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    @yield('head_scripts')
    <title>@yield('page_title')</title>
</head>

<body class="flex min-h-screen flex-col p-4">

    <section class="flex mb-4 gap-5">

        <aside class="flex flex-col gap-5">
            <section class="bg-orange-100 rounded-md p-3">
                <h1 class="text-lg font-bold text-center">EmpaBee/@yield('page_title')</h1>
            </section>

            <section class="grid grid-cols-2 bg-orange-100 rounded-md p-4  max-w-80">
                <section class="grid-span-1">
                    <span class="font-semibold">Bienvenido</span>
                    <span class="text-xl font-bold">{{ $user->primer_nombre }} {{ $user->primer_apellido }}</span>
                </section>
                <section class="grid-span-1 flex justify-end">
                    <img class="w-16 rounded-full" src="{{ $user->url_foto }}" alt="foto del usuario">
                </section>
                <p class="font-semibold grid-span-2">Nos alegra tenerte de vuelta</p>
            </section>

            <nav class="flex flex-col bg-orange-100 p-4 rounded-md">
                <ul class="flex flex-col gap-2">
                    <x-side-nav-item :route="route('dashboard')" :parentRoute="'dashboard'" :icon="'home'" :itemName="'Dashboard'"></x-side-nav-item>
                    <x-side-nav-item :route="''" :parentRoute="'no_rute'" :icon="'bar_chart'" :itemName="'Graficos de Producción'"></x-side-nav-item>
                    <x-side-nav-item :route="''" :parentRoute="'no_rute'" :icon="'person'" :itemName="'Perfil'"></x-side-nav-item>
                    <x-side-nav-item :route="route('colmenas.index')" :parentRoute="'colmenas'" :icon="'hive'" :itemName="'Colmenas'"></x-side-nav-item>
                    <li>
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <button type="submit">
                                <div class="flex justify-center group hover:bg-orange-300 p-3 gap-2 rounded-md">
                                    <i class="material-icons bg-orange-300 group-hover:bg-orange-200 rounded-md  p-1">logout</i>
                                    <span class="font-semibold mr-auto">Cerrar Sesión</span>
                                </div>
                            </button>
                        </form>
                    </li>
                </ul>
            </nav>
            <section>
                <img src="{{ asset('assets/images/l_empaBee_4.png') }}" alt="logotipo empabee">
            </section>
        </aside>

        <main class="w-full h-full flex flex-col gap-5 overflow-y-auto max-h-[800px]">
            @yield('contenido')
        </main>

    </section>

    <footer class="bg-orange-100 rounded-md p-3 text-center mt-auto">
        @2024 Made by EmpaBee
    </footer>

    @yield('scripts')

</body>

</html>
