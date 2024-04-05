@extends('/layouts/dashboard')

@section('page_title')
    {{ 'Colmenas' }}
@endsection

@section('contenido')
    <x-miga-papel-colmena :colmena="$colmena"></x-miga-papel-colmena>
    <x-nav-colmena :colmena="$colmena"></x-nav-colmena>
    @yield('contenido_colmena')
@endsection