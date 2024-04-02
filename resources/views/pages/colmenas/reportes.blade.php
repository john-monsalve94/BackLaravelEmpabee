@extends('pages/colmenas/colmena')

@section('contenido_colmena')
    <section class="flex justify-between p-4 border-b-2 border-gray-500 w-[80%] mx-auto">
        <h1 class="font-bold text-2xl">Reportes de {{ ucfirst($colmena->nombre) }}</h1>
        <x-filtro-reporte :colmena="$colmena"></x-filtro-reporte>
    </section>
    <section class="flex flex-col gap-3 mb-5 p-2 border border-orange-400 rounded-md w-[80%] mx-auto">
        @if ($reportes->isEmpty())
            <p class="text-center text-5xl mx-auto">No hay reportes que mostrar</p>
        @else
            <section class="mx-auto w-full flex flex-wrap justify-around gap-2">
                @foreach ($reportes as $reporte)
                    <x-card-reporte :colmena="$colmena" :reporte="$reporte"></x-card-reporte>
                @endforeach
            </section>
            <section class="flex justify-end w-[93%] mx-auto paginator-empabee">
                {{ $reportes->links() }}
            </section>
        @endif
    </section>
@endsection
