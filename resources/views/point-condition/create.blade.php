@extends('dashboard.main')

@section('content')
    <h1 class="text-xl mb-4">Tambah Ketentuan Point</h1>

    <form action="{{ route('point-conditions.store') }}" method="post">
        @csrf
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
            <label>
                <input type="text"
                       name="condition_name"
                       placeholder="Nama Ketentuan"
                       value="{{ old('condition_name') }}"
                       class="input input-bordered input-primary w-full"/>
                <x-validation-message name="condition_name"/>
            </label>
            <label>
                <input type="number"
                       name="minimum_point"
                       placeholder="Minimum Point"
                       value="{{ old('minimum_point') }}"
                       class="input input-bordered input-primary w-full"/>
                <x-validation-message name="minimum_point"/>
            </label>
            <label>
                <input type="number"
                       name="maximum_point"
                       placeholder="Minimum Point"
                       value="{{ old('maximum_point') }}"
                       class="input input-bordered input-primary w-full"/>
                <x-validation-message name="maximum_point"/>
            </label>
        </div>
        <button type="submit" class="btn btn-primary">Tambah</button>
    </form>
@endsection
