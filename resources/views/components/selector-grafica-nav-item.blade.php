@php
    $route_name = request()->route()->getName();
    $route = !isset($colmena) ? route($pageName.'_'.$nombreGrafica) : route($pageName.'_'.$nombreGrafica,['colmena'=>$colmena->id]);
@endphp
<a href="{{ $route }}" class="p-3 min-h-50 text-center min-w-[25%]  {{ $route_name == $pageName.'_'.$nombreGrafica ? 'bg-orange-400':'bg-orange-100' }} hover:bg-orange-300 rounded-md font-semibold">{{ ucfirst($nombreGrafica) }}</a>
