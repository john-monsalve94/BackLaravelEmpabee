<nav class="text-orange-400 font-bold text-xl py-3 pl-5">
    <a href="{{ route('colmenas.index') }}">Colmenas</a>
    <span>/</span>
    <a href="{{ route('colmenas.show',['colmena'=>$colmena->id]) }}">{{ $colmena->nombre }}</a>
</nav>