@extends('/layouts/dashboard')

@section('page_title')
    {{ 'Dashboard' }}
@endsection

@php
    switch (request()->route()->getName()) {
        case 'dashboard_temperatura':
            $titulo_pagina = 'temperatura';
            break;

        case 'dashboard_peso':
            $titulo_pagina = 'teso';
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
        <h1 class="text-center text-2xl font-semibold">Graficas de {{ ucfirst($titulo_pagina) }}</h1>
    </section>
    <section class="flex flex-col justify-center gap-5">
        <h2 class="text-xl font-semibold p-3 pl-10 bg-orange-100 w-[80%] mx-auto rounded-md">Medidas</h2>
        <x-tabla-medidas-empabee :medidas="$medidas"></x-tabla-medidas-empabee>
    </section>
@endsection

@section('scripts')
    <script defer>
        $(document).ready(() => {
            $.ajax({
                url: '{{ route('medidas_web', ['tipo' => $titulo_pagina]) }}',
                type: 'GET',
                success: function(response) {
                    let data = response.map((medida) => {
                        let {
                            valor,
                            created_at: fecha
                        } = medida;
                        let {
                            simbolo_medida
                        } = medida.sensor.tipo_sensor

                        fecha = new Date(fecha);
                        const dia = ('0' + fecha.getDate()).slice(-2);
                        const mes = ('0' + (fecha.getMonth() + 1)).slice(-2);
                        const anio = fecha.getFullYear().toString().slice(-2);
                        const hora = ('0' + fecha.getHours()).slice(-2);
                        const minuto = ('0' + fecha.getMinutes()).slice(-2);

                        fecha = `${dia}-${mes}-${anio}`;
                        let hora_medida = `${hora}:${minuto}`;
                        return {
                            valor: valor,
                            simbolo: simbolo_medida,
                            fecha: fecha,
                            hora: hora_medida
                        };
                    });
                    console.log(data);
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        });
    </script>
@endsection
