<div class="drawer-side">
    <label for="my-drawer-2" class="drawer-overlay"></label>
    <div class="relative overflow-y-hidden w-80 h-full bg-base-200 text-base-content menu">
        <div class="w-full fixed top-0 left-0 z-20 p-4 border-base-200/30 border-b-2 backdrop-blur-sm">
            <h1 class="text-primary text-2xl">
                {{ $title }}
            </h1>
        </div>
        {{ $menu }}
    </div>
</div>
