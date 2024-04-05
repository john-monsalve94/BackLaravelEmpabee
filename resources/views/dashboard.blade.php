@extends('/layouts/dashboard')

@section('head_scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@endsection

@section('page_title')
    {{ 'Dashboard' }}
@endsection

@php
    switch (request()->route()->getName()) {
        case 'dashboard_temperatura':
            $titulo_pagina = 'temperatura';
            break;

        case 'dashboard_peso':
            $titulo_pagina = 'peso';
            break;

        case 'dashboard_humedad':
            $titulo_pagina = 'humedad';
            break;

        default:
            break;
    }
@endphp

@section('contenido')
    <x-selector-grafica-nav :pageName="'dashboard'"></x-selector-grafica-nav>
    <section class="flex flex-col gap-3">
        <h1 class="text-center text-2xl font-semibold">Grafica de {{ ucfirst($titulo_pagina) }}</h1>
        <x-grafica-linear :idGrafica="'grafica_dashboard'" :ancho="'100%'" :alto="'300px'"></x-grafica-linear>
    </section>
    <section class="flex flex-col justify-center gap-5">
        <h2 class="text-xl font-semibold p-3 pl-10 bg-orange-100 w-[80%] mx-auto rounded-md">Medidas</h2>
        <x-tabla-medidas-empabee :medidas="$medidas"></x-tabla-medidas-empabee>
    </section>
@endsection

@section('scripts')
    <x-grafica-linear-script :tipo="$titulo_pagina" :idGrafico="'grafica_dashboard'"></x-grafica-linear-script>
@endsection
