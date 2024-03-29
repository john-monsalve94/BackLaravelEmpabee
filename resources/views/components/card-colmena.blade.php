@php
    $reportes = $colmena->controladores->flatMap(function ($controlador) {
        return $controlador->reportes;
    });

    $ultimoReporte = $reportes->sortByDesc('created_at')->first();

    switch ($colmena->estado) {
        case 'Info':
            $color = 'green';
            break;

        case 'Advertencia':
            $color = 'yellow';
            break;

        case 'Alerta':
            $color = 'red';
            break;

        default:
            $color = 'gray';
            break;
    }
    // @class([
    //     'w-full',
    //     'bg-orange-100',
    //     "border-$color-400",
    //     "hover:border-$color-300",
    //     'rounded-md',
    //     'p-3',
    //     'group'
    // ])
@endphp
<div onclick="window.location.href = '{{ route('colmenas.show', ['colmena' => $colmena->id]) }}'"
    class="w-full bg-orange-100 hover:bg-{{ $color }}-100 p-3 border-4 border-{{ $color }}-400 hover:border-orange-400 group rounded-md">
    <div class="flex justify-between">
        <i class="material-icons p-2 border-2 border-orange-400 rounded-full text-{{ $color }}-400 group-hover:text-orange-400">hive</i>
        <h3 class="text-end font-bold text-orange-400">{{ $colmena->nombre }}</h3>
    </div>
    <div class="flex justify-between font-semibold">
        <span class="text-orange-400">Estado:</span>
        <div class="flex flex-col items-end">
            <span class="text-orange-400">{{ $colmena->estado }}</span>
            <span class="text-{{ $color }}-500">{{ $ultimoReporte->contenido ?? 'Nueva colmena' }}</span>
        </div>
    </div>
</div>
