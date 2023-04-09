<?php

namespace Database\Seeders;

use App\Models\Achievement;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AchievementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $achievement = Achievement::query();

        $data = [
            [
                'achievement_types_id' => 1,
                'achievement_name' => 'Aktif anggota organisasi',
                'achievement_point' => 30,
            ],
            [
                'achievement_types_id' => 1,
                'achievement_name' => 'Menjadi pengurus organisasi',
                'achievement_point' => 70,
            ],
            [
                'achievement_types_id' => 1,
                'achievement_name' => 'Mengikuti workshop',
                'achievement_point' => 10,
            ],
            [
                'achievement_types_id' => 2,
                'achievement_name' => 'Donor darah',
                'achievement_point' => 10,
            ],
            [
                'achievement_types_id' => 2,
                'achievement_name' => 'Mengikuti kegiatan desa',
                'achievement_point' => 20,
            ],
            [
                'achievement_types_id' => 3,
                'achievement_name' => 'Juara tingkat kabupaten',
                'achievement_point' => 80,
            ],
            [
                'achievement_types_id' => 3,
                'achievement_name' => 'Juara tingkat provinsi',
                'achievement_point' => 120,
            ],
            [
                'achievement_types_id' => 3,
                'achievement_name' => 'Juara tingkat nasional',
                'achievement_point' => 200,
            ],
        ];

        $achievement->insert($data);
    }
}
