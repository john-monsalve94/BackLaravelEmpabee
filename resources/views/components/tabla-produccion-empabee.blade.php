@if ($producciones->isEmpty())
    <p class="text-center text-5xl">No hay producción para mostrar</p>
@else
    <section class="mb-5 flex flex-col p-2 border border-orange-400 rounded-md w-[80%] mx-auto">
        <table class="table-auto min-w-[100%]">
            @php
                $color_head = 'bg-orange-400';
            @endphp
            <thead>
                <tr class="flex justify-around mb-4">
                    <th class="{{ $color_head }} min-w-[25%] rounded-md">Siembra</th>
                    <th class="{{ $color_head }} min-w-[25%] rounded-md">Colmena</th>
                    <th class="{{ $color_head }} min-w-[25%] rounded-md">Extracción</th>
                </tr>
            </thead>
            <tbody class="flex flex-col gap-4 w-[100%]">
                @foreach ($producciones as $produccion)
                    @php
                        $color = $loop->even ? '' : 'bg-orange-100';
                    @endphp
                    <x-tabla-produccion-empabee-item :produccion="$produccion" :color="$color"></x-tabla-produccion-empabee-item>
                @endforeach
            </tbody>
        </table>
    </section>
    <section class="flex justify-end w-[80%] mx-auto paginator-empabee">
        {{ $producciones->links() }}
    </section>
@endif
