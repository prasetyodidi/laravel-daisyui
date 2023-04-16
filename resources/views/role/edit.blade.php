@extends('dashboard.main')

@section('content')
    <div class="w-full pt-20">
        <input type="text"
               placeholder="Type here"
               value="{{ $role->name }}"
               class="input input-bordered w-full max-w-xs"/>

        <div>
            @foreach($permissions as $key => $permission)
                <div class="flex flex-col" x-data="{ isAllChecked: true }">
                    <label>
                        <input type="checkbox" :checked="isAllChecked" @click="isAllChecked = !isAllChecked">
                        {{ $key }}
                    </label>
                    <div class="pl-3 flex flex-col">
                        @foreach($permission as $action)
                            <label>
                                <input type="checkbox" :checked="isAllChecked">
                                {{ $action }}
                            </label>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>

    </div>
@endsection

