@php
    $estilosAvg = ['w-[30%]', 'min-h-10', 'p-3', 'flex','flex-col', 'justify-center', 'items-center'];
    $titulo = ['w-full', 'p-2', 'rounded-t-md'];
    $temperatura_avg = ['rounded-bl-md', 'bg-green-400'];
    $peso_avg = ['bg-green-400'];
    $humedad_avg = ['rounded-br-md', 'bg-green-400'];

    if ($colmena->temperatura_minima !== null && $colmena->temperatura_maxima !== null) {
        $dif_temperatura = $colmena->temperatura_maxima - $colmena->temperatura_minima;
        if (
            $reporte->promedio_temperatura < $colmena->temperatura_minima ||
            $reporte->promedio_temperatura > $colmena->temperatura_maxima
        ) {
            $temperatura_avg = ['rounded-bl-md', 'bg-red-400'];
        } elseif (
            $colmena->temperatura_maxima - $reporte->promedio_temperatura <= 0.5 * $dif_temperatura ||
            $reporte->promedio_temperatura - $colmena->temperatura_minima >= 0.7 * $dif_temperatura
        ) {
            $temperatura_avg = ['rounded-bl-md', 'bg-yellow-400'];
        }
    }
    $temperatura_avg = array_merge($estilosAvg, $temperatura_avg);

    if ($colmena->peso_minimo !== null && $colmena->peso_maximo !== null) {
        if ($reporte->promedio_peso < 0.75 * $colmena->peso_minimo) {
            // $titulo_reporte = ReportStatus::ALERTA;
            $peso_avg = ['bg-red-400'];
        } elseif ($reporte->promedio_peso < 0.5 * $colmena->peso_minimo) {
            // $titulo_reporte = ReportStatus::ADVERTENCIA;
            $peso_avg = ['bg-yellow-400'];
        } elseif ($reporte->promedio_peso > $colmena->peso_maximo) {
            $contenido_reporte = 'Colmena lista para recolectar';
        }
    }
    $peso_avg = array_merge($estilosAvg, $peso_avg);

    if ($colmena->humedad_minima !== null && $colmena->humedad_maxima !== null) {
        $dif_humedad = $colmena->humedad_maxima - $colmena->humedad_minima;

        if (
            $reporte->promedio_humedad < $colmena->humedad_minima ||
            $reporte->promedio_humedad > $colmena->humedad_maxima
        ) {
            // $titulo_reporte = ReportStatus::ALERTA;
            $humedad_avg = ['rounded-br-md', 'bg-yellow-400'];
        } elseif (
            $colmena->humedad_maxima - $reporte->promedio_humedad <= 0.5 * $dif_humedad ||
            $reporte->promedio_humedad - $colmena->humedad_minima >= 0.7 * $dif_humedad
        ) {
            // $titulo_reporte = ReportStatus::ADVERTENCIA;
            $humedad_avg = ['rounded-br-md', 'bg-yellow-400'];
        }
    }
    $humedad_avg = array_merge($estilosAvg, $humedad_avg);

    switch ($reporte->titulo_reporte) {
        case 'Info':
            $titulo = array_merge($titulo, ['bg-green-400']);
            break;

        case 'Advertencia':
            $titulo = array_merge($titulo, ['bg-yellow-400']);
            break;

        case 'Alerta':
            $titulo = array_merge($titulo, ['bg-red-400']);
            break;

        default:
            # code...
            break;
    }
@endphp
<div class="w-3/12 p-1 flex flex-col gap-2 border-2 border-gray-400 hover:border-orange-400 rounded-md">
    <div @class($titulo)>
        <span class="font-bold">{{ $reporte->titulo_reporte }}:</span>
        <span class="font-semibold text-sm">{{ $reporte->contenido }}</span>
    </div>
    <div class="flex justify-between">
        <div @class($temperatura_avg)>
            <h3 class="text-xs font-bold">Temperatura</h3>
            <p class="text-lg font-semibold">{{ round($reporte->promedio_temperatura) }}</p>
        </div>
        <div @class($peso_avg)>
            <h3 class="text-xs font-bold">Peso</h3>
            <p class="text-lg font-semibold">{{ round($reporte->promedio_peso) }}</p>
        </div>
        <div @class($humedad_avg)>
            <h3 class="text-xs font-bold">Humedad</h3>
            <p class="text-lg font-semibold">{{ round($reporte->promedio_humedad) }}</p>
        </div>
    </div>
</div>
