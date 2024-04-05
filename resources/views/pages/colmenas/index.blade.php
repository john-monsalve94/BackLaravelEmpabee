@extends('/layouts/dashboard')

@section('page_title')
    {{ 'Colmenas' }}
@endsection

@section('contenido')
    <section class="flex flex-col gap-3">
        <h1 class="text-center text-3xl font-bold">Estas son tus colmenas</h1>
    </section>
    <section class="flex justify-between gap-4 flex-wrap border border-orange-400 rounded-md p-5 w-[90%] mx-auto">
        @if (empty($colmenas))
        @else
            @foreach ($colmenas as $colmena)
                <div class="w-3/12 min-w-[200px]">
                    <x-card-colmena :colmena="$colmena"></x-card-colmena>
                </div>
            @endforeach
        @endif
    </section>
    <section class="flex justify-end w-[90%] mx-auto paginator-empabee">
        {{ $colmenas->links() }}
    </section>
    <div class="fixed bottom-24 right-12">
        <x-float-button-add :createRoute="route('colmenas.store')"></x-float-button-add>
    </div>
@endsection
