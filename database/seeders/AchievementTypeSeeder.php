<?php

namespace Database\Seeders;

use App\Models\AchievementType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AchievementTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $achievementType = AchievementType::query();

        $data = [
            ['achievement_type_name' => 'Partisipasi Kegiatan'],
            ['achievement_type_name' => 'Prestasi'],
            ['achievement_type_name' => 'Kepedulian Sosial'],
        ];

        $achievementType->insert($data);
    }
}
