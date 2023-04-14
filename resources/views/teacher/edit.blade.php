@extends('dashboard.main')

@section('content')
    <h1 class="text-xl mb-4">Ubah Guru</h1>

    <form action="{{ route('teacher.update', $teacher->id) }}" method="post">
        @csrf
        @method('put')
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
            <label>
                <input type="text"
                       name="name"
                       placeholder="Nama"
                       value="{{ old('name', $teacher->name) }}"
                       class="input input-bordered input-primary w-full"/>
                <x-validation-message name="name"/>
            </label>
            <label>
                <input type="text"
                       name="username"
                       placeholder="username"
                       value="{{ old('username', $teacher->username) }}"
                       class="input input-bordered input-primary w-full"/>
                <x-validation-message name="username"/>
            </label>
            <label>
                <input type="text"
                       name="employee-id-number"
                       placeholder="NIP"
                       value="{{ old('employee-id-number', $teacher->employee_id_number) }}"
                       class="input input-bordered input-primary w-full"/>
                <x-validation-message name="student-id-number"/>
            </label>
            <label>
                <input type="text"
                       name="subject"
                       placeholder="Mata Pelajaran"
                       value="{{ old('subject', $teacher->subject) }}"
                       class="input input-bordered input-primary w-full"/>
                <x-validation-message name="subject"/>
            </label>
        </div>
        <button type="submit" class="btn btn-primary">Ubah</button>
    </form>
@endsection
