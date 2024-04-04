@extends('pages/colmenas/colmena')

@section('contenido_colmena')
    @if (!$siembras->isEmpty())
        <section class="flex flex-col gap-3 mb-5 w-[80%] mx-auto">
            @if (request()->route()->getName() == 'colmena_siembras')
                <div class="flex justify-between items-baseline">
                    <h2 class="text-2xl font-bold">{{ $siembras[0]->created_at }}</h2>
                    <a class="w-[25%] text-xl font-bold py-2 bg-orange-100 hover:bg-orange-200 text-center align-text-center rounded-md"
                        href="{{ route('colmena_produccion.create', ['colmena' => $colmena->id]) }}">Extraer</a>
                </div>
                <div class="flex p-5 border-2 border-orange-400 rounded-br-lg">
                    <span class="w-full h-full text-center font-bold text-3xl text-orange-400">{{ $produccion_miel }}L</span>
                </div>
            @else
                <form @style(['border:none;', 'margin:0;', 'padding:0;']) class="flex flex-col gap-2"
                    action="{{ route('colmena_produccion.store', ['colmena' => $colmena->id]) }}" method="post">
                    @csrf
                    <label class="font-bold text-lg" for="txtCantidadMiel">Cantidad de miel extraida (Litros)</label>
                    <input class="bg-orange-100 text-center border-none focus:ring-orange-400 focus:outline-none"
                        type="number" name="cantidad_miel" id="txtCantidadMiel">
                    <div class="flex justify-end gap-3">
                        <button class="bg-orange-200 p-1 font-semibold rounded-md hover:bg-orange-300 w-[30%]"
                            type="submit">Aceptar</button>
                        <a class="bg-orange-200 p-1 font-semibold rounded-md hover:bg-orange-200 w-[30%] text-center align-text-center"
                            href="{{ route('colmenas.configuracion', ['colmena' => $colmena->id]) }}">Cancelar</a>
                    </div>
                </form>
            @endif
        </section>
    @endif
    <section class="flex flex-col gap-3 w-[80%] mx-auto">
        <div class="flex justify-between items-center p-4 border-b-2 border-orange-400">
            <h2 class="text-bold text-2xl text-wrap font-bold">Historial de Siembras</h2>
            <x-float-button-add :createRoute="route('colmena_sembrar', ['colmena' => $colmena])"></x-float-button-add>
        </div>
        @if ($siembras->isEmpty())
            <p class="text-2xl font-bold text-center">No hay siembras aun</p>
        @else
            @php
                $colum_title = [
                    'w-[30%]',
                    'bg-orange-400',
                    'p-2',
                    'text-center',
                    'align-text-center',
                    'rounded-md',
                    'font-bold',
                    'text-xl',
                ];
                $colum_item = [
                    'w-[30%]',
                    'bg-orange-50',
                    'p-2',
                    'text-center',
                    'align-text-center',
                    'rounded-md',
                    'text-lg',
                    'font-semibold',
                ];
                $colum_link = [
                    'w-[30%]',
                    'bg-orange-100',
                    'py-2',
                    'text-center',
                    'align-text-center',
                    'rounded-md',
                    'text-lg',
                    'font-bold',
                    'text-orange-400',
                    'underline',
                ];
            @endphp
            <table class="flex flex-col gap-2 w-full">
                <thead class="flex flex-col w-full">
                    <tr class="flex justify-around">
                        <th @class($colum_title)>Inicio</th>
                        <th @class($colum_title)>Fin</th>
                        <th @class($colum_title)>Producción</th>
                    </tr>
                </thead>
                <tbody class="flex flex-col w-full gap-2">
                    @foreach ($siembras as $siembra)
                        <tr class="flex justify-around">
                            <td @class($colum_item)>
                                {{ $siembra->created_at }}
                            </td>
                            <td @class($colum_item)>
                                {{ $siembra->fecha_fin ?? 'No finalizado aun' }}
                            </td>
                            <td @class($colum_link)>
                                <a class="w-full h-full"
                                href="{{ route('siembra_produccion', ['colmena' => $colmena->id, 'siembra' => $siembra->id]) }}">Ver
                                    Producción</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <section class="flex justify-end w-[80%] mx-auto paginator-empabee">
                {{ $siembras->links() }}
            </section>
        @endif
    </section>
@endsection
