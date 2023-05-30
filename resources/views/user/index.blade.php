@extends('dashboard.main')

@section('content')
    <div class="w-full">
        <div class="overflow-x-auto w-full">
            <table class="table w-full" aria-describedby="list of users">
                <thead>
                <tr>
                    <th id="no" class="z-0">No</th>
                    <th id="name">Name</th>
                    <th id="email">Email</th>
                    <th id="role">Role</th>
                    <th id="verified-at">Terverifikasi</th>
                    <th id="created-at">Terbuat</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr class="hover">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            @foreach($user->roles as $role)
                            <div class="badge">{{ $role->name }}</div>
                            @endforeach
                        </td>
                        <td>{{ $user->email_verified_at }}</td>
                        <td>{{ $user->created_at }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $users->links() }}
        </div>
    </div>
@endsection
