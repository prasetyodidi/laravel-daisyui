@extends('dashboard.main')

@section('content')
    <h1 class="text-xl mb-4">Tambah Siswa</h1>

    <form action="{{ route('student-violations.store') }}" method="post">
        @csrf
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
            <label>
                <select name="student" class="select select-bordered w-full">
                    <option disabled selected>Pilih Siswa</option>
                    @foreach($students as $key => $student)
                            <option value="{{ $key }}">{{ $student }}</option>
                    @endforeach
                </select>
                <x-validation-message name="student"/>
            </label>
            <label>
                <select name="violation" class="select select-bordered w-full">
                    <option disabled selected>Pilih Pelanggaran</option>
                    @foreach($violations as $key => $violation)
                            <option value="{{ $key }}">{{ $violation  }}</option>
                    @endforeach
                </select>
                <x-validation-message name="violation"/>
            </label>
            <label>
                <input type="date"
                       name="violated-at"
                       value="{{ old('violated-at') }}"
                       class="input input-bordered input-primary w-full"/>
                <x-validation-message name="violated-at"/>
            </label>
        </div>
        <button type="submit" class="btn btn-primary">Tambah</button>
    </form>
@endsection
