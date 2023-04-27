<div x-data="{ open : true }"
     class="menu bg-base-100 my-2 py-2 rounded-md">
    <div class="flex flex-row justify-between px-2">
        <a>{{ $title }}</a>
        <x-heroicon-o-chevron-down x-show="!open" @click="open = true" class="w-6 h-6 hover:cursor-pointer"/>
        <x-heroicon-o-chevron-up x-show="open" @click="open = false" class="w-6 h-6 hover:cursor-pointer"/>
    </div>
    <div x-show="open"
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="transform opacity-0 scale-95"
         x-transition:enter-end="transform opacity-100 scale-100"
         x-transition:leave="transition ease-in duration-75"
         x-transition:leave-start="transform opacity-100 scale-100"
         x-transition:leave-end="transform opacity-0 scale-95"
         class="flex flex-col">
        {{ $content }}
    </div>
</div>
