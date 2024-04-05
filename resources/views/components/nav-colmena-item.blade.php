@php
    $current_route = request()->route();
    $current_route = $current_route -> getAction()['prefix'];
    $is_group = Str::endsWith($current_route, $group);
@endphp
<a href="{{ route($routeName,['colmena'=>$colmena->id]) }}" class="py-3 w-full max-w-[20%] rounded-md hover:bg-orange-300 {{ $is_group ? 'bg-orange-400' : 'bg-orange-100' }}">{{ $message }}</a>
