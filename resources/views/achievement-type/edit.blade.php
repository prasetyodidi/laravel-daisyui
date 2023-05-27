@extends('dashboard.main')

@section('content')
    <h1 class="text-xl mb-4">Ubah Jenis Pencapaian</h1>

    <form action="{{ route('achievement-types.update', $achievementType->id) }}" method="post">
        @csrf
        @method('put')
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
            <label>
                <input type="text"
                       name="achievement_type_name"
                       placeholder="Nama Jenis Pencapaian"
                       value="{{ old('achievement_type_name', $achievementType->achievement_type_name) }}"
                       class="input input-bordered input-primary w-full"/>
                <x-validation-message name="achievement_type_name"/>
            </label>
        </div>
        <button type="submit" class="btn btn-primary">Simpan perubahan</button>
    </form>
@endsection
