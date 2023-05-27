@extends('dashboard.main')

@section('content')
    <h1 class="text-xl mb-4">Tambah</h1>

    <form action="{{ route('student-achievements.store') }}" method="post">
        @csrf
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
            <label>
                <select name="student" class="select select-bordered w-full">
                    <option disabled selected>Pilih Siswa</option>
                    @foreach($students as $key => $student)
                        @if($key == old('student'))
                            <option value="{{ $key }}" selected>{{ $student }}</option>
                        @else
                            <option value="{{ $key }}">{{ $student }}</option>
                        @endif
                    @endforeach
                </select>
                <x-validation-message name="student"/>
            </label>
            <label>
                <select name="achievement" class="select select-bordered w-full">
                    <option disabled selected>Pilih Pencapaian</option>
                    @foreach($achievements as $key => $achievement)
                        @if($key == old('achievement'))
                            <option value="{{ $key }}" selected>{{ $achievement  }}</option>
                        @else
                            <option value="{{ $key }}">{{ $achievement  }}</option>
                        @endif
                    @endforeach
                </select>
                <x-validation-message name="achievement"/>
            </label>
            <label>
                <input type="date"
                       name="achieved_at"
                       value="{{ old('achieved_at') }}"
                       class="input input-bordered input-primary w-full"/>
                <x-validation-message name="achieved_at"/>
            </label>
        </div>
        <button type="submit" class="btn btn-primary">Tambah</button>
    </form>
@endsection
