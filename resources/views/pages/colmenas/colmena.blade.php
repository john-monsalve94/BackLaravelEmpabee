@extends('/layouts/dashboard')

@section('page_title')
    {{ 'Colmenas' }}
@endsection

@section('contenido')
    <x-miga-papel-colmena :colmena="$colmena"></x-miga-papel-colmena>
    <nav class="flex flex-wrap justify-between items-center p-2 gap-5 text-center font-semibold text-xl">
        <a href="" class="py-3 w-full max-w-[20%] bg-orange-100">Reportes</a>
        <a href="" class="py-3 w-full max-w-[20%] bg-orange-100">Configuración</a>
        <a href="" class="py-3 w-full max-w-[20%] bg-orange-100">Producción</a>
        <a href="{{ route('colmena_graficas',['colmena'=>$colmena->id]) }}" class="py-3 w-full max-w-[20%] bg-orange-100">Estado</a>
    </nav>
    @yield('contenido_colmena')
@endsection