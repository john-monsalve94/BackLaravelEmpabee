@extends('pages/colmenas/colmena')

@section('contenido_colmena')
    <section class="flex flex-col w-[80%] mx-auto">
        @if (request()->route()->getName() == 'colmenas.edit')
            <form  @style(['border:none;','margin:0;','padding:0;']) action="{{ route('colmenas.update',['colmena'=>$colmena->id]) }}" method="post" class="flex flex-col gap-3">
                @csrf
                @method('PUT')
                <input type="hidden" name="id" value="{{ $colmena->id }}">
                <h2 class="text-center bg-orange-400 p-2 font-bold">Peso</h2>
                <fieldset class="flex justify-between">
                    <div class="w-[45%] flex flex-col gap-2">
                        <label for="txtMaxPeso" class="p-2 text-center bg-orange-300 font-semibold">Max</label>
                        <input class="bg-orange-100 text-center border-none focus:ring-orange-400 focus:outline-none"
                            type="number" name="peso_maximo" id="txtMaxPeso" value="{{ $colmena->peso_maximo ?? '' }}">
                    </div>
                    <div class="w-[45%] flex flex-col gap-2">
                        <label for="txtMinPeso" class="p-2 text-center bg-orange-300 font-semibold">Min</label>
                        <input  class="bg-orange-100 text-center border-none focus:ring-orange-400 focus:outline-none"
                            type="number" name="peso_minimo" id="txtMinPeso" value="{{ $colmena->peso_minimo ?? '' }}">
                    </div>
                </fieldset>
                <h2 class="text-center bg-orange-400 p-2 font-bold">Humedad</h2>
                <fieldset class="flex justify-between">
                    <div class="w-[45%] flex flex-col gap-2">
                        <label for="txtMaxHumedad" class="p-2 text-center bg-orange-300 font-semibold">Max</label>
                        <input class="bg-orange-100 text-center border-none focus:ring-orange-400 focus:outline-none"
                            type="number" name="humedad_maxima" id="txtMaxHumedad"
                            value="{{ $colmena->humedad_maxima ?? '' }}">
                    </div>
                    <div class="w-[45%] flex flex-col gap-2">
                        <label for="txtMinHumedad" class="p-2 text-center bg-orange-300 font-semibold">Min</label>
                        <input class="bg-orange-100 text-center border-none focus:ring-orange-400 focus:outline-none"
                            type="number" name="humedad_minima" id="txtMinHumedad"
                            value="{{ $colmena->humedad_minima ?? '' }}">
                    </div>
                </fieldset>
                <h2 class="text-center bg-orange-400 p-2 font-bold">Temperatura</h2>
                <fieldset class="flex justify-between">
                    <div class="w-[45%] flex flex-col gap-2">
                        <label for="txtMaxTemperatura" class="p-2 text-center bg-orange-300 font-semibold">Max</label>
                        <input class="bg-orange-100 text-center border-none focus:ring-orange-400 focus:outline-none"
                            type="number" name="temperatura_maxima" id="txtMaxTemperatura"
                            value="{{ $colmena->temperatura_maxima ?? '' }}">
                    </div>
                    <div class="w-[45%] flex flex-col gap-2">
                        <label for="txtMinTemperatura" class="p-2 text-center bg-orange-300 font-semibold">Min</label>
                        <input class="bg-orange-100 text-center border-none focus:ring-orange-400 focus:outline-none"
                            type="number" name="temperatura_minima" id="txtMinTemperatura"
                            value="{{ $colmena->temperatura_minima ?? '' }}">
                    </div>
                </fieldset>
                <div class="flex justify-between w-full">
                    <button class="bg-orange-400 p-4 font-semibold rounded-md hover:bg-orange-300 w-[30%]"
                        type="submit">Aceptar</button>
                    <a class="bg-orange-300 p-4 font-semibold rounded-md hover:bg-orange-200 w-[30%] text-center align-text-center"
                        href="{{ route('colmenas.configuracion', ['colmena'=>$colmena->id]) }}">Cancelar</a>
                </div>
            </form>
        @else
            <div class="flex flex-col gap-3">
                <div class="flex justify-between items-center">
                    <a class="bg-orange-400 p-4 font-semibold rounded-md hover:bg-orange-300 w-[30%] text-lg text-center align-text-center"
                        href="{{ route('colmenas.edit',['colmena'=>$colmena->id]) }}">Editar</a>
                    <form @style(['border:none;','margin:0;','padding:0;']) class="w-[30%]" action="{{ route('colmenas.destroy',['colmena'=>$colmena->id]) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="bg-orange-300 p-4 font-semibold rounded-md hover:bg-orange-200 w-full" type="submit">Eliminar</button>
                    </form>
                </div>
                <h2 class="text-center bg-orange-400 p-2 font-bold">Peso</h2>
                <div class="flex justify-between">
                    <div @style(['width:45;']) class="w-[45%] flex flex-col gap-2">
                        <span class="p-2 text-center bg-orange-300 font-semibold">Max</span>
                        <span class="bg-orange-100 text-center">{{ $colmena->peso_maximo ?? 'Sin definir' }} KG</span>
                    </div>
                    <div class="w-[45%] flex flex-col gap-2">
                        <span class="p-2 text-center bg-orange-300 font-semibold">Min</span>
                        <span class="bg-orange-100 text-center">{{ $colmena->peso_minimo ?? 'Sin definir' }} KG</span>
                    </div>
                </div>
                <h2 class="text-center bg-orange-400 p-2 font-bold">Humedad</h2>
                <div class="flex justify-between">
                    <div class="w-[45%] flex flex-col gap-2">
                        <span class="p-2 text-center bg-orange-300 font-semibold">Max</span>
                        <span class="bg-orange-100 text-center">{{ $colmena->humedad_maxima ?? 'Sin definir' }} %</span>
                    </div>
                    <div class="w-[45%] flex flex-col gap-2">
                        <span class="p-2 text-center bg-orange-300 font-semibold">Min</span>
                        <span class="bg-orange-100 text-center">{{ $colmena->humedad_minima ?? 'Sin definir' }} %</span>
                    </div>
                </div>
                <h2 class="text-center bg-orange-400 p-2 font-bold">Temperatura</h2>
                <div class="flex justify-between">
                    <div class="w-[45%] flex flex-col gap-2">
                        <span class="p-2 text-center bg-orange-300 font-semibold">Max</span>
                        <span class="bg-orange-100 text-center">{{ $colmena->temperatura_maxima ?? 'Sin definir' }} °C</span>
                    </div>
                    <div class="w-[45%] flex flex-col gap-2">
                        <span class="p-2 text-center bg-orange-300 font-semibold">Min</span>
                        <span class="bg-orange-100 text-center">{{ $colmena->temperatura_minima ?? 'Sin definir' }} °C</span>
                    </div>
                </div>
            </div>
        @endif
    </section>
    <section class="flex flex-col w-[80%] mx-auto">
        <div class="flex justify-between border-b-2 border-orange-400 p-5">
            <h2 class=" p-2 text-3xl aling-text-center font-bold">Controladores</h2>
            <x-float-button-add :createRoute="route('colmenas.create_controlador',['colmena'=>$colmena->id])"></x-float-button-add>
        </div>
        @if ($controladores->isEmpty())
            <p class="p-4 text-lg font-semibold">No hay controladores</p>
        @else
            @foreach ($controladores as $index => $controlador)
                <div class="flex justify-between p-3">
                    <span class="text-lg font-semibold min-w-1/2">Controlador N. {{ $index + 1 }}</span>
                    <div class="flex flex-col p-3 bg-orange-100 min-w-[50%] items-center rounded-md">
                        <span class="font-semibold w-full pl-4">Codigo</span>
                        <p class="font-semibold text-wrap">{{ $controlador->uuid }}</p>
                    </div>
                </div>
            @endforeach
            <section class="flex justify-end w-[80%] mx-auto paginator-empabee">
                {{ $controladores->links() }}
            </section>
        @endif
    </section>
@endsection
