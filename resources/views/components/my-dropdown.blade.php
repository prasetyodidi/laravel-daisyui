<div x-data="{ open : true }" class="menu bg-base-100">
    <div class="flex flex-row justify-between">
        <a class="px-4">{{ $title }}</a>
        <x-heroicon-o-chevron-down x-show="!open" @click="open = true" class="w-6 h-6 hover:cursor-pointer"/>
        <x-heroicon-o-chevron-up x-show="open" @click="open = false" class="w-6 h-6 hover:cursor-pointer"/>
    </div>
    <div x-show="open" class="flex flex-col">
        {{ $content }}
    </div>
</div>
