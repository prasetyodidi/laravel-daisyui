@extends('dashboard.main')

@section('content')
    <h1 class="text-xl mb-4">Ubah</h1>

    <form action="{{ route('student-achievements.update', $studentAchievement->id) }}" method="post">
        @csrf
        @method('put')
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
            <label>
                <select name="student" class="select select-bordered w-full">
                    <option disabled>Pilih Siswa</option>
                    @foreach($students as $key => $student)
                        @if($key == $studentAchievement->students_id)
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
                    <option disabled>Pilih Pencapaian</option>
                    @foreach($achievements as $key => $achievement)
                        @if($key == $studentAchievement->achievements_id)
                            <option value="{{ $key }}" selected>{{ $achievement }}</option>
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
                       value="{{ old('achieved_at', $studentAchievement->achieved_at) }}"
                       class="input input-bordered input-primary w-full"/>
                <x-validation-message name="achieved_at"/>
            </label>
        </div>
        <button type="submit" class="btn btn-primary">Ubah</button>
    </form>
@endsection
