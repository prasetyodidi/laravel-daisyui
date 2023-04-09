@extends('dashboard.main')

@section('content')
    <div class="w-full pt-20">
        <div class="overflow-x-auto w-full">
            <table class="table w-full">
                <thead>
                <tr>
                    <th class="z-0">No</th>
                    <th>Permission Name</th>
                    <th>Created at</th>
                </tr>
                </thead>
                <tbody>
                @foreach($permissions as $permission)
                    <tr class="hover">
                        <th>{{ $loop->iteration }}</th>
                        <td>{{ $permission->name }}</td>
                        <td>{{ $permission->created_at }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
