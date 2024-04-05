@extends('/layouts/dashboard')

@section('page_title')
    {{ 'Perfil' }}
@endsection

@php
    $box_item = ['flex','flex-col','gap-2','w-2/5',' p-2','border-b-2','border-orange-400'];
    $title = ['text-lg ','font-bold','text-orange-500'];
    $text = ['font-semibold'];
@endphp

@section('contenido')
    <section class="flex flex-col gap-12 items-center">
        <img class="w-52 h-52 rounded-full border-2 border-orange-400 mx-auto" src="{{ $user->url_foto }}"
            alt="foto de perfil de {{ $user->primer_nombre . ' ' . $user->primer_apellido }}">
        <div class="flex flex-wrap justify-around w-[80%] mx-auto">
            <div @class($box_item)>
                <h2 @class($title)>Primer nombre</h2>
                <p @class($text)>{{ $user->primer_nombre }}</p>
            </div>
            <div @class($box_item)>
                <h2 @class($title)>Segundo nombre</h2>
                <p @class($text)>{{ $user->segundo_nombre ?? 'No registra' }}</p>
            </div>
        </div>
        <div class="flex flex-wrap justify-around w-[80%] mx-auto">
            <div @class($box_item)>
                <h2 @class($title)>Primer apellido</h2>
                <p @class($text)>{{ $user->primer_apellido }}</p>
            </div>
            <div @class($box_item)>
                <h2 @class($title)>Segundo apellido</h2>
                <p @class($text)>{{ $user->segundo_apellido ?? 'No registra' }}</p>
            </div>
        </div>
        <div class="flex flex-wrap justify-around w-[80%] mx-auto">
            <div @class($box_item)>
                <h2 @class($title)>Tipo de Identificación</h2>
                <p @class($text)>{{ $user->tipo_identificacion->nombre_identificacion }}</p>
            </div>
            <div @class($box_item)>
                <h2 @class($title)>N. Identificación</h2>
                <p @class($text)>{{ $user->numero_identificacion }}</p>
            </div>
        </div>

        <div class="flex flex-wrap justify-around w-[80%] mx-auto">
            <div @class($box_item)>
                <h2 @class($title)>Municipio Residencia</h2>
                <p @class($text)>{{ $user->municipio_residencia->nombre_municipio }}</p>
            </div>
            <div @class($box_item)>
                <h2 @class($title)>Municipio Nacimiento</h2>
                <p @class($text)>{{ $user->municipio_nacimiento->nombre_municipio }}</p>
            </div>
        </div>
    </section>
@endsection
