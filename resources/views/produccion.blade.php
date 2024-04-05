@extends('/layouts/dashboard')

@section('head_scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@endsection

@section('page_title')
    {{ 'Produccion' }}
@endsection


@section('contenido')
    <section class="flex flex-col gap-3">
        <h1 class="text-center text-2xl font-semibold">Grafica de Producción</h1>
        <x-grafica-linear :idGrafica="'grafica_produccion'" :ancho="'100%'" :alto="'300px'"></x-grafica-linear>
    </section>
    <section class="flex flex-col justify-center gap-5">
        <h2 class="text-xl font-semibold p-3 pl-10 bg-orange-100 w-[80%] mx-auto rounded-md">Producciones</h2>
        <x-tabla-produccion-empabee :producciones="$producciones"></x-tabla-produccion-empabee>
    </section>
@endsection

@section('scripts')
    <x-grafica-barras-script :tipo="'Produccion'" :idGrafico="'grafica_produccion'"></x-grafica-barras-script>
@endsection