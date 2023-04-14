@extends('dashboard.main')

@section('content')
    <div class="w-full">
        <div class="flex flex-row justify-between">
            <a href="#modal-import-user" class="btn btn-success my-2">Import User</a>
            <a href="{{ route('users.create')  }}" class="btn btn-success my-2">New User</a>
        </div>
        <div class="overflow-x-auto w-full">
            <table class="table w-full" aria-describedby="list of users">
                <thead>
                <tr>
                    <th id="no" class="z-0">No</th>
                    <th id="name">Name</th>
                    <th id="email">Email</th>
                    <th id="role">Role</th>
                    <th id="verified-at">Verified at</th>
                    <th id="created-at">Created at</th>
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

    <div class="modal" id="modal-import-user">
        <form action="{{ route('user.import') }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('post')
            <div class="modal-box">
                <h1 class="font-bold text-lg mb-6">Import User</h1>

                <div class="form-control w-full max-w-xs">
                    <input type="file"
                           name="excel-file"
                           id="excel-file"
                           class="file-input file-input-bordered w-full max-w-xs" />
                    <label class="label">
                        <x-validation-message name="excel-file"/>
                    </label>
                </div>

                <div class="modal-action flex flex-row justify-between">
                    <a href="#" class="btn">Close</a>
                    <a href="#" class="btn btn-primary">Import</a>
                </div>
            </div>
        </form>
    </div>
@endsection
