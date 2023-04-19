@extends('dashboard.main')

@section('content')
    <div class="w-full">

        <div class="flex flex-row justify-end">
            <a href="{{ route('student-violations.create')  }}" class="btn btn-primary my-2">Tambah</a>
        </div>
        <div class="overflow-x-auto w-full">
            <table class="table w-full" aria-describedby="list of users">
                <thead>
                <tr>
                    <th id="no" class="z-0">No</th>
                    <th id="name">Nama</th>
                    <th id="email">Kelas</th>
                    <th id="role">Pelapor</th>
                    <th id="verified-at">Pelanggaran</th>
                    <th id="verified-at">Point</th>
                    <th id="verified-at">Tanggal Pelanggaran</th>
                    <th id="action"></th>
                </tr>
                </thead>
                <tbody>
                @foreach($studentViolations as $key => $student)
                    <tr class="hover hover:cursor-pointer">
                        <th id="row-number">{{ $studentViolations->firstItem() + $key }}</th>
                        <td>{{ $student->student->name }}</td>
                        <td>{{ $student->student->studentClass->class_name }}</td>
                        <td>{{ $student->reported->name }}</td>
                        <td>{{ $student->violation->violation_name }}</td>
                        <td>{{ $student->violation->violation_point }}</td>
                        <td>{{ $student->violated_at }}</td>
                        <td class="flex flex-row gap-2 h-full">
                            <a href="{{ route('student-violations.edit', $student->id) }}"
                               class="flex flex-row items-center gap-1 hover:link text-orange-600 text-sm py-1">
                                <x-heroicon-o-pencil class="h-4 w-4 "/>
                                edit
                            </a>
                            <a href="#modal-delete-{{ $loop->iteration }}"
                               class="flex flex-row items-center gap-1 hover:link text-red-600 text-sm py-1">
                                <x-heroicon-o-trash class="h-4 w-4 "/>
                                delete
                            </a>

                            <div class="modal" id="modal-delete-{{ $loop->iteration }}">
                                <div class="modal-box w-5/12 max-w-5xl">
                                    <form action="{{ route('student-violations.destroy', $student->id) }}"
                                          method="post">
                                        @csrf
                                        @method('delete')

                                        <h1 class="font-bold text-xl text-center">Hapus Pelanggaran Siswa</h1>
                                        <h2 class="text-center">
                                            Apakah anda yakin menghapus data pelanggaran siswa ini
                                        </h2>

                                        <div class="modal-action flex flex-row justify-between mt-8">
                                            <a href="#" class="btn">Tutup</a>
                                            <button type="submit" class="btn btn-error">Hapus</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $studentViolations->links()  }}
        </div>
    </div>
@endsection
