<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Daisy Dashboard</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="drawer drawer-mobile">
        <input id="my-drawer-2" type="checkbox" class="drawer-toggle" ></input>
        <div class="drawer-content relative flex flex-col items-center justify-between md:justify-start">
            @include('dashboard.navbar')

            @for ($i = 0; $i < 10; $i++)
            <div class="hero min-h-screen bg-base-200">
                <div class="hero-content flex-col lg:flex-row">
                    <img src="https://source.unsplash.com/random/?spiderman"
                        alt="city night"
                        class="max-w-sm rounded-lg shadow-2xl" />
                    <div>
                    <h1 class="text-5xl font-bold">Box Office News!</h1>
                    <p class="py-6">
                        Provident cupiditate voluptatem et in.
                        Quaerat fugiat ut assumenda excepturi exercitationem quasi.
                        In deleniti eaque aut repudiandae et a id nisi.
                    </p>
                    <button class="btn btn-primary">Get Started</button>
                    </div>
                </div>
            </div>
            @endfor
        </div>

        <x-sidebar>
            <x-slot name="title">DaisyUI</x-slot>
            <x-slot name="menu">
                @for ($i = 0; $i < 20; $i++)
                    <li class="rounded-md @if ($i == 7) btn-active @endif">
                        <a>Sidebar Item {{ $i }}</a>
                    </li>
                @endfor
            </x-slot>
        </x-sidebar>

    </div>
</body>
</html>
