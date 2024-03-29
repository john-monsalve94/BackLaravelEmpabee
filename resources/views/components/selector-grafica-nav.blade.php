<nav class="flex justify-between">
    <x-selector-grafica-nav-item :pageName="$pageName" :nombreGrafica="'temperatura'" :colmena="$colmena??null"></x-selector-grafica-nav-item>
    <x-selector-grafica-nav-item :pageName="$pageName" :nombreGrafica="'peso'" :colmena="$colmena??null"></x-selector-grafica-nav-item>
    <x-selector-grafica-nav-item :pageName="$pageName" :nombreGrafica="'humedad'" :colmena="$colmena??null"></x-selector-grafica-nav-item>
</nav>
