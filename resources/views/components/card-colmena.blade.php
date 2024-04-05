@php
    $reportes = $colmena->controladores->flatMap(function ($controlador) {
        return $controlador->reportes;
    });

    $ultimoReporte = $reportes->sortByDesc('created_at')->first();

    $estilos_card = ['w-full','border-2','group','rounded-md','p-3'];
    $estilos_icon = ['material-icons','p-2','border-2','rounded-full','border-orange-400','text-orange-400'];
    $estilos_message = [];
    switch ($colmena->estado) {
        case 'Info':
            $estilos_card = array_merge($estilos_card,[
                'border-green-400',
                'bg-green-100',
                'hover:bg-green-50'
            ]);
            $estilos_icon = array_merge($estilos_icon,[
                'group-hover:text-green-400',
                'group-hover:border-green-400'
            ]);
            $estilos_message = ['text-green-600'];
            break;

        case 'Advertencia':
            $estilos_card = array_merge($estilos_card,[
                'border-yellow-400',
                'bg-yellow-100',
                'hover:bg-yellow-50'
            ]);
            $estilos_icon = array_merge($estilos_icon,[
                'group-hover:text-yellow-400',
                'group-hover:border-yellow-400'
            ]);
            $estilos_message = ['text-yellow-600'];
            break;

        case 'Alerta':
            $estilos_card = array_merge($estilos_card,[
                'border-red-400',
                'bg-red-100',
                'hover:bg-red-50'
            ]);
            $estilos_icon = array_merge($estilos_icon,[
                'group-hover:text-red-400',
                'group-hover:border-red-400'
            ]);
            $estilos_message = ['text-red-600'];
            break;

        default:
            $estilos_card = array_merge($estilos_card,[
                'border-gray-400',
                'bg-gray-100',
                'hover:bg-gray-50'
            ]);
            $estilos_icon = array_merge($estilos_icon,[
                'group-hover:text-gray-400',
                'group-hover:border-gray-400'
            ]);
            $estilos_message = ['text-gray-600'];
            break;
    }
@endphp
<div onclick="window.location.href = '{{ route('colmenas.show', ['colmena' => $colmena->id]) }}'"
    @class($estilos_card)>
    <div class="flex justify-between">
        <i @class($estilos_icon)>hive</i>
        <h3 class="text-end font-bold text-orange-400">{{ $colmena->nombre }}</h3>
    </div>
    <div class="flex justify-between font-semibold">
        <span class="text-orange-400">Estado:</span>
        <div class="flex flex-col items-end">
            <span class="text-orange-400">{{ $colmena->estado }}</span>
            <span @class($estilos_message)>{{ $ultimoReporte->contenido ?? 'Nueva colmena' }}</span>
        </div>
    </div>
</div>
