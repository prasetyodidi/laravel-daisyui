@extends('dashboard.main')

@section('content')
    <h1 class="text-xl mb-4">Ubah Admin</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('admins.update', $admin->id) }}" method="post">
        @csrf
        @method('put')
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
            <label>
                <input type="text"
                       name="name"
                       placeholder="Nama"
                       value="{{ old('name', $admin->name) }}"
                       class="input input-bordered input-primary w-full"/>
                <x-validation-message name="name"/>
            </label>
            <label>
                <input type="text"
                       name="username"
                       placeholder="username"
                       value="{{ old('username', $admin->username) }}"
                       class="input input-bordered input-primary w-full"/>
                <x-validation-message name="username"/>
            </label>
            <label>
                <input type="text"
                       name="employee-id-number"
                       placeholder="NIP"
                       value="{{ old('employee-id-number', $admin->employee_id_number) }}"
                       class="input input-bordered input-primary w-full"/>
                <x-validation-message name="employee-id-number"/>
            </label>
        </div>
        <button type="submit" class="btn btn-primary">Ubah</button>
    </form>
@endsection
