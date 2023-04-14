<div class="drawer-side">
    <label for="my-drawer-2" class="drawer-overlay"></label>
    <div class="overflow-y-hidden w-80 h-full bg-base-200 text-base-content menu">
        <div class="fixed w-full z-10 p-5 border-base-200 opacity-30 border-b-2 backdrop-blur-sm">
            <h1 class="text-primary text-2xl">
                {{ $title }}
            </h1>
        </div>
        {{ $menu }}
    </div>
</div>
