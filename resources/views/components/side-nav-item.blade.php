@php
    $selected_route = str_starts_with(request()->url(), url($parentRoute))
@endphp
<li>
    <a href="{{ $route }}">
        <div class="flex justify-center group hover:bg-orange-300 {{ $selected_route ? 'bg-orange-400' : '' }} p-3 gap-2 rounded-md">
            <i class="material-icons bg-orange-300 group-hover:bg-orange-200 rounded-md {{ $selected_route ? 'mr-auto' : '' }} p-1">{{ $icon }}</i>
            <span class="font-semibold mr-auto">{{ $itemName }}</span>
        </div>
    </a>
</li>
