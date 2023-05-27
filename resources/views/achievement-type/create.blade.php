@extends('dashboard.main')

@section('content')
    <h1 class="text-xl mb-4">Tambah Jenis Pencapaian</h1>

    <form action="{{ route('achievement-types.store') }}" method="post">
        @csrf
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
            <label>
                <input type="text"
                       name="achievement_type_name"
                       placeholder="Nama Jenis Pencapaian"
                       value="{{ old('achievement_type_name') }}"
                       class="input input-bordered input-primary w-full"/>
                <x-validation-message name="achievement_type_name"/>
            </label>
        </div>
        <button type="submit" class="btn btn-primary">Tambah</button>
    </form>
@endsection
