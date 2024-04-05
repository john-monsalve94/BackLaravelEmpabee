<tr class="text-center font-semibold flex justify-around">
    <td class="{{ $color }} border-2 border-orange-100 min-w-[25%] rounded-md">
        {{ $medida->created_at }}
    </td>
    <td class="{{ $color }} border-2 border-orange-100 min-w-[25%] rounded-md">
        {{ $medida->sensor->controlador->colmena->nombre }}
    </td>
    <td class="{{ $color }} border-2 border-orange-100 min-w-[25%] rounded-md">
        {{ $medida->valor." ".$medida->sensor->tipo_sensor->simbolo_medida }}
    </td>
</tr>
