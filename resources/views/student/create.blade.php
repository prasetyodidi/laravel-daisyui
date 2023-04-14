@extends('dashboard.main')

@section('content')
    <h1 class="text-xl mb-4">Tambah Siswa</h1>

    <form action="{{ route('students.store') }}" method="post">
        @csrf
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
            <label>
                <input type="text" name="name" placeholder="Nama" class="input input-bordered input-primary w-full"/>
                <x-validation-message name="name"/>
            </label>
            <label>
                <select name="student-class" class="select select-bordered w-full">
                    <option disabled selected>Pilih kelas</option>
                    @foreach($classes as $class)
                        <option value="{{ $class->id }}">{{ $class->class_name  }}</option>
                    @endforeach
                </select>
                <x-validation-message name="student-class"/>
            </label>
            <label>
                <input type="text"
                       name="student-id-number"
                       placeholder="NIS"
                       class="input input-bordered input-primary w-full"/>
                <x-validation-message name="student-id-number"/>
            </label>
            <label>
                <input type="text"
                       name="address"
                       placeholder="Alamat"
                       class="input input-bordered input-primary w-full"/>
                <x-validation-message name="address"/>
            </label>
            <label>
                <select name="gender" class="select select-bordered w-full">
                    <option disabled selected>Pilih Jenis Kelamin</option>
                    @foreach($genders as $gender)
                        <option value="{{ $gender['id'] }}">{{ $gender['name']  }}</option>
                    @endforeach
                </select>
                <x-validation-message name="gender"/>
            </label>
        </div>
        <button type="submit" class="btn btn-primary">Tambah</button>
    </form>
@endsection
