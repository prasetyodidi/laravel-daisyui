@extends('dashboard.main')

@section('content')
    <div class="w-full pt-20">
        <div class="overflow-x-auto w-full">
            <table class="table w-full">
                <thead>
                <tr>
                    <th class="z-0">No</th>
                    <th>Role Name</th>
                    <th>Permission</th>
                    <th>Created at</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($roles as $role)
                    <tr class="hover">
                        <th>{{ $loop->iteration }}</th>
                        <td>{{ $role->name }}</td>
                        <td>
                            @foreach($role->permissions as $key => $permission)
                                @if($key < 2)
                                    <div class="badge badge-primary">{{ $permission->name }}</div>
                                @endif
                            @endforeach
                            and {{ count($role->permissions) - 2 }} more
                        </td>
                        <td>{{ $role->created_at }}</td>
                        <td class="flex flex-row gap-2 h-full">
                            <a href="{{ route('roles.edit', $role->id) }}"
                               class="flex flex-row items-center gap-1 hover:link text-orange-600 text-sm py-1">
                                <x-heroicon-o-pencil class="h-4 w-4 "/>
                                edit
                            </a>
{{--                            <a href="#modal-delete-{{ $loop->iteration }}"--}}
{{--                               class="flex flex-row items-center gap-1 hover:link text-red-600 text-sm py-1">--}}
{{--                                <x-heroicon-o-trash class="h-4 w-4 "/>--}}
{{--                                delete--}}
{{--                            </a>--}}

                            <div class="modal" id="modal-delete-{{ $loop->iteration }}">
                                <div class="modal-box w-5/12 max-w-5xl">
                                    <form action="{{ route('roles.destroy', $role->id) }}" method="post">
                                        @csrf
                                        @method('delete')

                                        <h1 class="font-bold text-xl text-center">Hapus Siswa</h1>
                                        <h2 class="text-center">Apakah anda yakin menghapus data siswa ini</h2>

                                        <div class="modal-action flex flex-row justify-between mt-8">
                                            <a href="#" class="btn">Tutup</a>
                                            <button type="submit" class="btn btn-error">Hapus</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
