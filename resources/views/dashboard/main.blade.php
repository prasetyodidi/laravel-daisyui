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

            <div x-data="{ notification: true }" class="z-30 toast toast-top toast-end">
                @if(session('success'))
                <div x-show="notification" class="alert alert-success">
                    <div>
                        <x-heroicon-o-x-circle @click="notification = false" class="h-6 w-6 hover:cursor-pointer"/>
                        <span>{{ session('success') }}</span>
                    </div>
                </div>
                @endif
                @if(session('fail'))
                <div x-show="notification" class="alert alert-error">
                    <div>
                        <x-heroicon-o-x-circle @click="notification = false" class="h-6 w-6 hover:cursor-pointer"/>
                        <span>{{ session('fail') }}</span>
                    </div>
                </div>
                @endif
            </div>

            <div class="w-full py-20 px-8">

                @yield('content')

            </div>

        </div>

        <x-sidebar>
            <x-slot name="title">Point Siswa</x-slot>
            <x-slot name="menu">
                <ul class="overflow-y-auto p-4 pt-20 text-sm">
                    <x-sidebar-item>
                        <x-slot name="title">Dashboard</x-slot>
                        <x-slot name="icon">
                            <x-heroicon-o-document-text class="h-5 w-5"/>
                        </x-slot>
                        <x-slot name="routeName">dashboard</x-slot>
                    </x-sidebar-item>
                    <x-sidebar-item>
                        <x-slot name="title">Activitas</x-slot>
                        <x-slot name="icon">
                            <x-heroicon-o-document-text class="h-5 w-5"/>
                        </x-slot>
                        <x-slot name="routeName">activities.index</x-slot>
                    </x-sidebar-item>
                    <x-sidebar-item>
                        <x-slot name="title">Guru</x-slot>
                        <x-slot name="icon">
                            <x-heroicon-o-document-text class="h-5 w-5"/>
                        </x-slot>
                        <x-slot name="routeName">teacher.index</x-slot>
                    </x-sidebar-item>
                    <x-sidebar-item>
                        <x-slot name="title">Ketentuan Point</x-slot>
                        <x-slot name="icon">
                            <x-heroicon-o-document-text class="h-5 w-5"/>
                        </x-slot>
                        <x-slot name="routeName">point-conditions.index</x-slot>
                    </x-sidebar-item>
                    @can('viewAny', \App\Models\StudentClass::class)
                    <x-sidebar-item>
                        <x-slot name="title">Kelas</x-slot>
                        <x-slot name="icon">
                            <x-heroicon-o-document-text class="h-5 w-5"/>
                        </x-slot>
                        <x-slot name="routeName">student-classes.index</x-slot>
                        <x-slot name="activeAt">student-classes.*</x-slot>
                    </x-sidebar-item>
                    @endcan
                    <x-sidebar-item>
                        <x-slot name="title">Siswa</x-slot>
                        <x-slot name="icon">
                            <x-heroicon-o-document-text class="h-5 w-5"/>
                        </x-slot>
                        <x-slot name="routeName">students.index</x-slot>
                        <x-slot name="activeAt">students.*</x-slot>
                    </x-sidebar-item>
                    <x-sidebar-item>
                        <x-slot name="title">Pelanggaran Siswa</x-slot>
                        <x-slot name="icon">
                            <x-heroicon-o-document-text class="h-5 w-5"/>
                        </x-slot>
                        <x-slot name="routeName">student-violations.index</x-slot>
                    </x-sidebar-item>
                    <x-sidebar-item>
                        <x-slot name="title">Pelanggaran</x-slot>
                        <x-slot name="icon">
                            <x-heroicon-o-document-text class="h-5 w-5"/>
                        </x-slot>
                        <x-slot name="routeName">violations.index</x-slot>
                    </x-sidebar-item>
                    <x-sidebar-item>
                        <x-slot name="title">Jenis Pelanggaran</x-slot>
                        <x-slot name="icon">
                            <x-heroicon-o-document-text class="h-5 w-5"/>
                        </x-slot>
                        <x-slot name="routeName">violation-types.index</x-slot>
                    </x-sidebar-item>
                    <x-sidebar-item>
                        <x-slot name="title">Penghargaan Siswa</x-slot>
                        <x-slot name="icon">
                            <x-heroicon-o-document-text class="h-5 w-5"/>
                        </x-slot>
                        <x-slot name="routeName">student-achievements.index</x-slot>
                    </x-sidebar-item>
                    <x-sidebar-item>
                        <x-slot name="title">Penghargaan</x-slot>
                        <x-slot name="icon">
                            <x-heroicon-o-document-text class="h-5 w-5"/>
                        </x-slot>
                        <x-slot name="routeName">achievements.index</x-slot>
                    </x-sidebar-item>
                    <x-sidebar-item>
                        <x-slot name="title">Jenis Penghargaan</x-slot>
                        <x-slot name="icon">
                            <x-heroicon-o-document-text class="h-5 w-5"/>
                        </x-slot>
                        <x-slot name="routeName">achievement-types.index</x-slot>
                    </x-sidebar-item>
                    <x-my-dropdown>
                        <x-slot name="title">Permission</x-slot>
                        <x-slot name="content">
                            <ul>
                                <li>
                                    <a href="{{ route('users.index') }}"
                                       class="{{ request()->routeIs('users.index') ? 'active' : '' }}
                                               menu-item">
                                        User
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('permissions.index') }}"
                                       class="{{ request()->routeIs('permissions.index') ? 'active' : '' }} menu-item">
                                        Permission
                                    </a>
                                </li>
                                <li><a class="menu-item">Role</a></li>
                            </ul>
                        </x-slot>
                    </x-my-dropdown>
                </ul>
            </x-slot>
        </x-sidebar>
    </div>
</body>
</html>
