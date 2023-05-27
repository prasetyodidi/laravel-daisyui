@extends('dashboard.main')

@section('content')
    <h1 class="text-xl mb-4">Tambah Admin</h1>

    <form action="{{ route('admins.store') }}" method="post">
        @csrf
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
            <label>
                <input type="text"
                       name="name"
                       placeholder="Nama"
                       value="{{ old('name') }}"
                       class="input input-bordered input-primary w-full"/>
                <x-validation-message name="name"/>
            </label>
            <label>
                <input type="text"
                       name="username"
                       placeholder="Username"
                       value="{{ old('username') }}"
                       class="input input-bordered input-primary w-full"/>
                <x-validation-message name="username"/>
            </label>
            <label>
                <input type="email"
                       name="email"
                       placeholder="Email"
                       value="{{ old('email') }}"
                       class="input input-bordered input-primary w-full"/>
                <x-validation-message name="email"/>
            </label>
            <label>
                <input type="text"
                       name="employee_id_number"
                       placeholder="NIP"
                       value="{{ old('employee_id_number') }}"
                       class="input input-bordered input-primary w-full"/>
                <x-validation-message name="employee_id_number"/>
            </label>
            <label>
                <input type="password"
                       name="password"
                       placeholder="Password"
                       class="input input-bordered input-primary w-full"/>
                <x-validation-message name="password"/>
            </label>
            <label>
                <input type="password"
                       name="password_confirmation"
                       placeholder="Konfirmasi Password"
                       class="input input-bordered input-primary w-full"/>
                <x-validation-message name="password_confirmation"/>
            </label>
        </div>
        <button type="submit" class="btn btn-primary">Tambah</button>
    </form>
@endsection
