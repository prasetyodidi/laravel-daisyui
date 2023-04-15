@extends('dashboard.main')

@section('content')
    <h1 class="text-xl mb-4">Ubah</h1>

    <form action="{{ route('student-violations.update', $studentViolation->id) }}" method="post">
        @csrf
        @method('put')
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
            <label>
                <select name="student" class="select select-bordered w-full">
                    <option disabled>Pilih Siswa</option>
                    @foreach($students as $key => $student)
                        @if($key == $studentViolation->students_id)
                            <option value="{{ $key }}" selected>{{ $student }}</option>
                        @else
                            <option value="{{ $key }}">{{ $student }}</option>
                        @endif
                    @endforeach
                </select>
                <x-validation-message name="student"/>
            </label>
            <label>
                <select name="violation" class="select select-bordered w-full">
                    <option disabled>Pilih Pelanggaran</option>
                    @foreach($violations as $key => $violation)
                        @if($key == $studentViolation->violations_id)
                            <option value="{{ $key }}" selected>{{ $violation }}</option>
                        @else
                            <option value="{{ $key }}">{{ $violation  }}</option>
                        @endif
                    @endforeach
                </select>
                <x-validation-message name="violation"/>
            </label>
            <label>
                <input type="date"
                       name="violated-at"
                       value="{{ old('violated-at', $studentViolation->violated_at) }}"
                       class="input input-bordered input-primary w-full"/>
                <x-validation-message name="violated-at"/>
            </label>
        </div>
        <button type="submit" class="btn btn-primary">Ubah</button>
    </form>
@endsection
