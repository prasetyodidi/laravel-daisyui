@extends('dashboard.main')

@section('content')
    <h1 class="text-xl mb-4">Tambah Guru</h1>

    <form action="{{ route('teacher.store') }}" method="post">
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
                       placeholder="username"
                       value="{{ old('username') }}"
                       class="input input-bordered input-primary w-full"/>
                <x-validation-message name="username"/>
            </label>
            <label>
                <input type="email"
                       name="email"
                       placeholder="email"
                       value="{{ old('email') }}"
                       class="input input-bordered input-primary w-full"/>
                <x-validation-message name="email"/>
            </label>
            <label>
                <input type="text"
                       name="employee-id-number"
                       placeholder="NIP"
                       value="{{ old('employee-id-number') }}"
                       class="input input-bordered input-primary w-full"/>
                <x-validation-message name="employee-id-number"/>
            </label>
            <label>
                <input type="password"
                       name="password"
                       placeholder="password"
                       class="input input-bordered input-primary w-full"/>
                <x-validation-message name="password"/>
            </label>
            <label>
                <input type="password"
                       name="password_confirmation"
                       placeholder="confirm password"
                       class="input input-bordered input-primary w-full"/>
                <x-validation-message name="password_confirmation"/>
            </label>
            <label>
                <input type="text"
                       name="subject"
                       placeholder="Mata Pelajaran"
                       value="{{ old('subject') }}"
                       class="input input-bordered input-primary w-full"/>
                <x-validation-message name="subject"/>
            </label>
        </div>
        <button type="submit" class="btn btn-primary">Tambah</button>
    </form>
@endsection
