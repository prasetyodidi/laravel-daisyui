@extends('dashboard.main')

@section('content')
    <h1 class="text-xl mb-4">Tambah Jenis Pelanggaran</h1>

    <form action="{{ route('violation-types.store') }}" method="post">
        @csrf
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
            <label>
                <input type="text"
                       name="violation-type-name"
                       placeholder="Nama Jenis Pelanggaran"
                       value="{{ old('violation-type-name') }}"
                       class="input input-bordered input-primary w-full"/>
                <x-validation-message name="violation-type-name"/>
            </label>
        </div>
        <button type="submit" class="btn btn-primary">Tambah</button>
    </form>
@endsection
