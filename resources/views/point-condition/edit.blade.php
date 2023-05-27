@extends('dashboard.main')

@section('content')
    <h1 class="text-xl mb-4">Ubah Ketentuan Point</h1>

    <form action="{{ route('point-conditions.update', $pointCondition->id) }}" method="post">
        @csrf
        @method('put')
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
            <label>
                <input type="text"
                       name="condition-name"
                       placeholder="Nama Ketentuan"
                       value="{{ old('condition-name', $pointCondition->condition_name) }}"
                       class="input input-bordered input-primary w-full"/>
                <x-validation-message name="condition-name"/>
            </label>
            <label>
                <input type="number"
                       name="minimum-point"
                       placeholder="Minimum Point"
                       value="{{ old('minimum-point', $pointCondition->minimum_point) }}"
                       class="input input-bordered input-primary w-full"/>
                <x-validation-message name="minimum-point"/>
            </label>
            <label>
                <input type="number"
                       name="maximum-point"
                       placeholder="Minimum Point"
                       value="{{ old('maximum-point', $pointCondition->maximum_point) }}"
                       class="input input-bordered input-primary w-full"/>
                <x-validation-message name="maximum-point"/>
            </label>
        </div>
        <button type="submit" class="btn btn-primary">Ubah</button>
    </form>
@endsection
