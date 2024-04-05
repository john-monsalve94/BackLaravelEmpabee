<tr class="text-center font-semibold flex justify-around">
    <td class="{{ $color }} border-2 border-orange-100 min-w-[25%] rounded-md">
        {{ $produccion->siembra->created_at }}
    </td>
    <td class="{{ $color }} border-2 border-orange-100 min-w-[25%] rounded-md">
        {{ $produccion->siembra->colmena->nombre }}
    </td>
    <td class="{{ $color }} border-2 border-orange-100 min-w-[25%] rounded-md">
        {{ $produccion->cantidad_miel }} L
    </td>
</tr>
