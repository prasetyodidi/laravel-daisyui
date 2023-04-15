@extends('dashboard.main')

@section('content')
    <div class="w-full">
        <div class="overflow-x-auto w-full">
            <table class="table w-full" aria-describedby="list of users">
                <thead>
                <tr>
                    <th id="no" class="z-0">No</th>
                    <th id="name">Tanggal</th>
                    <th id="email">Aktivitas</th>
                </tr>
                </thead>
                <tbody>
                @foreach($activities as $key => $activity)
                    <tr class="hover hover:cursor-pointer">
                        <th id="row-number">{{ $activities->firstItem() + $key }}</th>
                        <td>{{ $activity['created_at'] }}</td>
                        <td>{{ $activity['name'] }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $activities->links()  }}
        </div>
    </div>
@endsection
