@extends('dashboard.main')

@section('content')
    <div class="w-full pt-20">
        <a href="#my-modal-2" class="btn btn-success">Import User</a>
        <div class="overflow-x-auto w-full">
            <table class="table w-full">
                <thead>
                <tr>
                    <th class="z-0">No</th>
                    <th>Name</th>
                    <th>Email</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                <tr class="hover">
                    <th>{{ $loop->iteration }}</th>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="modal" id="my-modal-2">
        <form action="{{ route('user.import') }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('post')
            <div class="modal-box">
                <h1 class="font-bold text-lg mb-6">Import User</h1>

                <div class="form-control w-full max-w-xs">
                    <input type="file" name="excel-file" id="excel-file" class="file-input file-input-bordered w-full max-w-xs" />
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
