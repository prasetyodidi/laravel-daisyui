<?php

namespace Database\Seeders;

use App\Models\Violation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ViolationSeeder extends Seeder
{
    private array $violationsType1 = [
        [
            'violation_types_id' => 1,
            'violation_name' => 'Tidak membawa buku pelajaran sesuai jadwal',
            'violation_point' => 10
        ],
        [
            'violation_types_id' => 1,
            'violation_name' => 'Melindungi teman yang bersalah',
            'violation_point' => 15
        ],
        [
            'violation_types_id' => 1,
            'violation_name' => 'Berpacaran di sekolah',
            'violation_point' => 20
        ],
        [
            'violation_types_id' => 1,
            'violation_name' => 'Menyalahgunakan uang SPP atau uang sekolah',
            'violation_point' => 25
        ],
        [
            'violation_types_id' => 1,
            'violation_name' => 'Membawa atau menyembunyikan petasan',
            'violation_point' => 30
        ],
        [
            'violation_types_id' => 1,
            'violation_name' => 'Membuat surat ijin palsu',
            'violation_point' => 40
        ],
        [
            'violation_types_id' => 1,
            'violation_name' => 'Bertindak tidak sopan / melecehkan kepala sekolah, guru dan karyawan',
            'violation_point' => 50
        ],
        [
            'violation_types_id' => 1,
            'violation_name' => 'Mengancam / mengintimidasi teman sekolah sekelas / sekolah',
            'violation_point' => 70
        ],
        [
            'violation_types_id' => 1,
            'violation_name' => 'Mengancam / mengintimidasi teman Kepala sekolah, guru dan karyawan',
            'violation_point' => 100
        ],
        [
            'violation_types_id' => 1,
            'violation_name' => 'Berjudi dalam bentuk apapun di sekolah',
            'violation_point' => 150
        ],
        [
            'violation_types_id' => 1,
            'violation_name' => 'Membuat vidio / buku pornografi',
            'violation_point' => 200
        ],
        [
            'violation_types_id' => 1,
            'violation_name' => 'Terbukti hamil atau menghamili',
            'violation_point' => 250
        ],
    ];

    private array $violationsType2 = [
        [
            'violation_types_id' => 2,
            'violation_name' => 'Datang terlambat',
            'violation_point' => 10
        ],
        [
            'violation_types_id' => 2,
            'violation_name' => 'Tidak mengikuti upacara',
            'violation_point' => 20
        ],
        [
            'violation_types_id' => 2,
            'violation_name' => 'Menghilangkan buku tata tertib',
            'violation_point' => 50
        ],
    ];

    private array $violationsType3 = [
        [
            'violation_types_id' => 3,
            'violation_name' => 'Tidak memasukkan baju',
            'violation_point' => 10
        ],
        [
            'violation_types_id' => 3,
            'violation_name' => 'Seragam atribut tidak lengkap',
            'violation_point' => 20
        ],
    ];

    public function run(): void
    {
        $violations = array_merge(
            $this->violationsType1,
            $this->violationsType2,
            $this->violationsType3
        );
        Violation::query()->insert($violations);
    }
}
