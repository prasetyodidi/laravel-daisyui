@extends('dashboard.main')

@section('content')
    <h1 class="text-xl mb-4">Edit Pelanggaran</h1>

    <form action="{{ route('violations.update', $violation->id) }}" method="post">
        @csrf
        @method('put')
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
            <label>
                <input type="text"
                       name="violation_name"
                       placeholder="Nama Pelanggaran"
                       value="{{ old('violation_name', $violation->violation_name) }}"
                       class="input input-bordered input-primary w-full"/>
                <x-validation-message name="violation_name"/>
            </label>
            <label>
                <input type="number"
                       name="violation_point"
                       placeholder="Point Pelanggaran"
                       value="{{ old('violation_point', $violation->violation_point) }}"
                       class="input input-bordered input-primary w-full"/>
                <x-validation-message name="violation_point"/>
            </label>
            <label>
                <select name="violation_type" class="select select-bordered w-full">
                    <option disabled>Pilih Jenis Pelanggaran</option>
                    @foreach($violationTypes as $key => $type)
                        @if($key == $violation->violation_types_id)
                            <option value="{{ $key }}" selected>{{ $type }}</option>
                        @else
                            <option value="{{ $key }}">{{ $type }}</option>
                        @endif
                    @endforeach
                </select>
                <x-validation-message name="violation_type"/>
            </label>
        </div>
        <button type="submit" class="btn btn-primary">Tambah</button>
    </form>
@endsection
