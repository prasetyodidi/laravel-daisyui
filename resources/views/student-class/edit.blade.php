@extends('dashboard.main')

@section('content')
    <h1 class="text-xl mb-4">Ubah Kelas</h1>

    <form action="{{ route('student-classes.update', $studentClass->id) }}" method="post">
        @csrf
        @method('put')
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
            <label>
                <input type="text"
                       name="class-name"
                       placeholder="Nama Kelas"
                       value="{{ old('name', $studentClass->class_name) }}"
                       class="input input-bordered input-primary w-full"/>
                <x-validation-message name="class-name"/>
            </label>
            <label>
                <select name="homeroom-teacher" class="select select-bordered w-full">
                    <option disabled>Pilih Wali Kelas</option>
                    @foreach($teachers as $teacher)
                        @if($teacher->id == $studentClass->homeroom_teachers_id)
                            <option value="{{ $teacher->id }}" selected>{{ $teacher->name }}</option>
                        @else
                            <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                        @endif
                    @endforeach
                </select>
                <x-validation-message name="homeroom-teachers"/>
            </label>
        </div>
        <button type="submit" class="btn btn-primary">Ubah</button>
    </form>
@endsection
