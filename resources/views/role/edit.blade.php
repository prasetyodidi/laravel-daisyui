@extends('dashboard.main')

@section('content')
    <div class="w-full pt-20">
        <form action="{{ route('roles.update', $role) }}" method="post">
            @csrf
            @method('PUT')
            <label>
                <span class="text-sm">Nama Role</span>
                <input type="text"
                       placeholder="Nama Role"
                       value="{{ $role->name }}"
                       class="input input-bordered w-full mb-4"/>
            </label>

            <div class="grid grid-cols-3 gap-4">
                @foreach($permissions as $key => $permission)
                    <div class="flex flex-col" x-data="{ isAllChecked: true }" id="{{ $key }}">
                        <label onclick="toggleTest('{{ $key }}')">
                            <input type="checkbox" class="checkbox {{ $key }}">
                            {{ $key }}
                        </label>
                        <div class="pl-3 flex flex-col">
                            @foreach($permission as $action)
                                <label>
                                    <input type="checkbox"
                                           name="permissions[]"
                                           value="{{ $action }}"
                                           @if(in_array($action, $permissionsRole))
                                               checked
                                           @endif
                                           class="checkbox checkbox-sm {{ $key }}">
                                    {{ $action }}
                                </label>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
            <button type="submit" class="btn btn-primary mt-2">Ubah</button>
        </form>
    </div>

    <script>
        function toggleTest(className) {
            const test = document.getElementsByClassName(className);

            for (let i = 1; i < test.length; i++) {
                test[i].checked = test[0].checked;
            }
        }
    </script>

@endsection
