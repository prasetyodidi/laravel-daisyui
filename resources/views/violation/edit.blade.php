@extends('dashboard.main')

@section('content')
    <h1 class="text-xl mb-4">Edit Pelanggaran</h1>

    <form action="{{ route('violations.update', $violation->id) }}" method="post">
        @csrf
        @method('put')
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
            <label>
                <input type="text"
                       name="violation-name"
                       placeholder="Nama Pelanggaran"
                       value="{{ old('violation-name', $violation->violation_name) }}"
                       class="input input-bordered input-primary w-full"/>
                <x-validation-message name="violation-name"/>
            </label>
            <label>
                <input type="number"
                       name="violation-point"
                       placeholder="Point Pelanggaran"
                       value="{{ old('violation-point', $violation->violation_point) }}"
                       class="input input-bordered input-primary w-full"/>
                <x-validation-message name="violation-point"/>
            </label>
            <label>
                <select name="violation-type" class="select select-bordered w-full">
                    <option disabled>Pilih jenis pelanggaran</option>
                    @foreach($violationTypes as $key => $type)
                        @if($key == $violation->violation_types_id)
                            <option value="{{ $key }}" selected>{{ $type }}</option>
                        @else
                            <option value="{{ $key }}">{{ $type }}</option>
                        @endif
                    @endforeach
                </select>
                <x-validation-message name="student-class"/>
            </label>
        </div>
        <button type="submit" class="btn btn-primary">Tambah</button>
    </form>
@endsection
