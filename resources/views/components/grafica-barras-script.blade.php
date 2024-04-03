@php
    $route_url = route('medidas_web');

    if (isset($siembra)) {
        $colmena_id = (int) $colmena->id;
        $route_url .= '&colmena_id=' . $colmena_id;
    }
    $route_url = str_replace('&amp;', '&', $route_url);
@endphp