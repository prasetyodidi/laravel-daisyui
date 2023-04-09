@extends('dashboard.main')

@section('content')
    <div class="w-full pt-20">
        <input type="text" placeholder="Type here" class="input input-bordered w-full max-w-xs" value="{{ $role->name }}" />


    </div>
@endsection
