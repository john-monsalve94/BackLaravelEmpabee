@php
    $tipo = request()->query('tipo') ?? '';
    $estilos_select = ['rounded-md', 'border-2 ', 'focus:outline-none','font-semibold'];
    switch ($tipo) {
        case 'Info':
            $estilos_select = array_merge($estilos_select, [
                'bg-green-100',
                'border-green-400',
                'focus:border-green-500',
                'focus:ring-green-500',
            ]);
            break;

        case 'Advertencia':
            $estilos_select = array_merge($estilos_select, [
                'bg-yellow-100',
                'border-yellow-400',
                'focus:border-yellow-500',
                'focus:ring-yellow-500',
            ]);
            break;

        case 'Alerta':
            $estilos_select = array_merge($estilos_select, [
                'bg-red-100',
                'border-red-400',
                'focus:border-red-500',
                'focus:ring-red-500',
            ]);
            break;

        default:
            $estilos_select = array_merge($estilos_select, [
                'bg-orange-100',
                'border-orange-400',
                'focus:border-orange-500',
                'focus:ring-orange-500',
            ]);
            break;
    }
    //class="rounded-md border-2 {{ $border_color }} border-{{ $color }}-500 focus:ring-{{ $color }}-500 focus:outline-none"
@endphp
<form @style(['border:none;','margin:0;','padding:0;']) class="ml-auto" id="filtro_form" action="{{ route('colmena_reportes', ['colmena' => $colmena->id]) }}" method="get">
    <select @class($estilos_select) id="filtro" name="tipo">
        <option class="bg-orange-100 checked:bg-orange-400 hover:bg-orange-300 mb-2" value=""
            {{ $tipo == '' ? 'selected' : '' }}>Filtrar
        </option>
        <option class="bg-green-100 checked:bg-green-400 hover:bg-green-300 mb-2" value="Info"
            {{ $tipo == 'Info' ? 'selected' : '' }}>Info</option>
        <option class="bg-yellow-100 checked:bg-yellow-400 hover:bg-yellow-300 mb-2" value="Advertencia"
            {{ $tipo == 'Advertencia' ? 'selected' : '' }}>Advertencia
        </option>
        <option class="bg-red-100 checked:bg-red-400 hover:bg-red-300 mb-2" value="Alerta"
            {{ $tipo == 'Alerta' ? 'selected' : '' }}>Alerta</option>
    </select>
</form>
<script>
    let select = document.getElementById('filtro');

    select.addEventListener('change', function() {
        let form = document.getElementById('filtro_form');
        form.submit();
    });
</script>
