<!DOCTYPE html>
<html lang="en" x-data="{ dark: false }" x-bind:data-theme="dark === true ? 'dark' : 'winter'">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title ?? 'Daisy Dashboard' }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="drawer drawer-mobile">
        <input id="my-drawer-2" type="checkbox" class="drawer-toggle" >
        <div class="drawer-content relative flex flex-col items-center justify-between md:justify-start">

            <x-navbar/>

            @yield('content')

        </div>

        <x-sidebar>
            <x-slot name="title">DaisyUI</x-slot>
            <x-slot name="menu">
                <ul class="overflow-y-auto p-4 mt-14">
                    <li>
                        <a>
                            <x-heroicon-o-home class="h-6 w-6"/>
                            Dashboard
                        </a>
                    </li>
                    <li><a>Aktivity</a></li>
                    <li><a>Ketentuan Point</a></li>
                    <li><a>Kelas</a></li>
                    <li><a>Siswa</a></li>
                    <li><a>Laporan Pelanggaran</a></li>
                    <li><a>Pelanggaran Siswa</a></li>
                    <li><a>Guru</a></li>
                    <li><a>Pelanggaran</a></li>
                    <li><a>Jenis Pelanggaran</a></li>
                    <x-my-dropdown>
                        <x-slot name="title">Permission</x-slot>
                        <x-slot name="content">
                            <ul>
                                <li>
                                    <a href="{{ route('users.index') }}"
                                       class="{{ request()->routeIs('users.index') ? 'active' : '' }}">User</a>
                                </li>
                                <li>
                                    <a href="{{ route('permissions.index') }}"
                                       class="{{ request()->routeIs('permissions.index') ? 'active' : '' }}">
                                        Permission
                                    </a>
                                </li>
                                <li><a>Role</a></li>
                            </ul>
                        </x-slot>
                    </x-my-dropdown>
                </ul>
            </x-slot>
        </x-sidebar>
    </div>
</body>
</html>
