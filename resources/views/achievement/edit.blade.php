@extends('dashboard.main')

@section('content')
    <h1 class="text-xl mb-4">Edit Pencapaian</h1>

    <form action="{{ route('achievements.update', $achievement->id) }}" method="post">
        @csrf
        @method('put')
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
            <label>
                <input type="text"
                       name="achievement_name"
                       placeholder="Nama Pelanggaran"
                       value="{{ old('achievement_name', $achievement->achievement_name) }}"
                       class="input input-bordered input-primary w-full"/>
                <x-validation-message name="achievement_name"/>
            </label>
            <label>
                <input type="number"
                       name="achievement_point"
                       placeholder="Point Pelanggaran"
                       value="{{ old('achievement_point', $achievement->achievement_point) }}"
                       class="input input-bordered input-primary w-full"/>
                <x-validation-message name="achievement_point"/>
            </label>
            <label>
                <select name="achievement_type" class="select select-bordered w-full">
                    <option disabled>Pilih Jenis Pencapaian</option>
                    @foreach($achievementTypes as $key => $type)
                        @if($key == $achievement->achievement_types_id)
                            <option value="{{ $key }}" selected>{{ $type }}</option>
                        @else
                            <option value="{{ $key }}">{{ $type }}</option>
                        @endif
                    @endforeach
                </select>
                <x-validation-message name="achievement_type"/>
            </label>
        </div>
        <button type="submit" class="btn btn-primary">Tambah</button>
    </form>
@endsection
