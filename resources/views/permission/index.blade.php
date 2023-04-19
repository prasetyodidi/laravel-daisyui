@extends('dashboard.main')

@section('content')
    <div class="w-full pt-20">
        <div class="overflow-x-auto w-full">
            <table class="table w-full" aria-describedby="table permissions">
                <thead>
                <tr>
                    <th id="no">No</th>
                    <th id="permission-name">Permission Name</th>
                    <th id="created-at">Terbuat</th>
                </tr>
                </thead>
                <tbody>
                @foreach($permissions as $permission)
                    <tr class="hover">
                        <th id="row-number">{{ $loop->iteration }}</th>
                        <td>{{ $permission->name }}</td>
                        <td>{{ $permission->created_at }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
