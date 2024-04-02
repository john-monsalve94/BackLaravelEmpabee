<nav class="flex flex-wrap justify-between items-center p-2 gap-5 text-center font-semibold text-xl">
    <x-nav-colmena-item  :routeName="'colmena_reportes'" :colmena="$colmena" :group="'reportes'" :message="'Reportes'"></x-nav-colmena-item>
    <x-nav-colmena-item  :routeName="'colmenas.configuracion'" :colmena="$colmena" :group="'configuracion'" :message="'Configuracion'"></x-nav-colmena-item>
    <a href="" class="py-3 w-full max-w-[20%] bg-orange-100">Producción</a>
    <x-nav-colmena-item  :routeName="'colmena_graficas'" :colmena="$colmena" :group="'graficas'" :message="'Estado'"></x-nav-colmena-item>
</nav>