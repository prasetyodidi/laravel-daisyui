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
                        <td><a href="{{ route('roles.edit', $role->id) }}" class="link">edit</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
