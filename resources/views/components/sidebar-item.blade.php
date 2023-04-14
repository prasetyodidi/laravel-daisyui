<li>
    <a href="{{ route("$routeName") }}"
       class="{{ request()->routeIs($activeAt ?? $routeName) ? 'active' : '' }}
              py-2 rounded-md my-1">
        {{ $icon }}
        {{ $title }}
    </a>
</li>
