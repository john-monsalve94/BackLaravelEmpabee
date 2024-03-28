@php
    $route_name = request()->route()->getName();
@endphp
<nav class="flex justify-between">
    <a href="{{ route($pageName.'_temperatura') }}" class="p-3 min-h-50 text-center min-w-[25%]  {{ $route_name == $pageName.'_temperatura' ? 'bg-orange-400':'bg-orange-100' }} hover:bg-orange-300 rounded-md font-semibold">Temperatura</a>
    <a href="{{ route($pageName.'_peso') }}" class="p-3 text-center min-w-[25%] {{ $route_name == $pageName.'_peso' ? 'bg-orange-400':'bg-orange-100' }}  rounded-md font-semibold hover:bg-orange-300">Peso</a>
    <a href="{{ route($pageName.'_humedad') }}" class="p-3 text-center min-w-[25%] {{ $route_name == $pageName.'_humedad' ? 'bg-orange-400':'bg-orange-100' }}  rounded-md font-semibold hover:bg-orange-300">Humedad</a>
</nav>
