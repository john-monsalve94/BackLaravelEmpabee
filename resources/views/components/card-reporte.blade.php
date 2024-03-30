<div class="w-3/12 p-1 flex flex-col gap-2 border-2 border-gray-400 hover:border-orange-400 rounded-md">
    <div class="w-full p-2 bg-gray-400 rounded-t-md">
        <span class="font-bold">{{ $reporte->titulo_reporte }}:</span>
        <span class="font-semibold text-sm">{{ $reporte->contenido }}</span>
    </div>
    <div class="flex justify-between">
        <div class="w-[30%] h-10 bg-gray-400 rounded-bl-md p-3 flex justify-center items-center">
            <p class="text-lg font-semibold">{{ round($reporte->promedio_temperatura) }}</p>
        </div>
        <div class="w-[30%] h-10 bg-gray-400 p-3 flex justify-center items-center">
            <p class="text-lg font-semibold">{{ round($reporte->promedio_perso) }}</p>
        </div>
        <div class="w-[30%] h-10 bg-gray-400 rounded-br-md p-3 flex justify-center items-center">
            <p class="text-lg font-semibold">{{ round($reporte->promedio_humeda) }}</p>
        </div>
    </div>
</div>
