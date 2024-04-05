<section class="flex flex-col gap-5 bg-orange-100 w-[80%] mx-auto p-4 rounded-md">
    <section class="flex justify-between w-full">
        <span class="text-3xl font-semibold text-center">Promedio</span>
        <img src="{{  asset('assets/images/l_empaBee_5.png') }}" alt="logo empabee">
    </section>
    <canvas id="{{ $idGrafica }}" style="width: {{ $ancho }}; height:{{ $alto }};"></canvas>
</section>