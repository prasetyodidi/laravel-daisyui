<?php

namespace Database\Seeders;

use App\Models\PointCondition;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PointConditionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PointCondition::factory()->create([
            'condition_name' => 'Peringatan ke 1 (wali kelas)',
            'minimum_point' => 10,
            'maximum_point' => 25
        ]);

        PointCondition::factory()->create([
            'condition_name' => 'Peringatan ke 2 (wali kelas & K3)',
            'minimum_point' => 26,
            'maximum_point' => 45
        ]);

        PointCondition::factory()->create([
            'condition_name' => 'Panggilan Orang Tua ke 1 (wali kelas)',
            'minimum_point' => 45,
            'maximum_point' => 75
        ]);

        PointCondition::factory()->create([
            'condition_name' => 'Peringatan ke 2 (wali kelas dan guru BK)',
            'minimum_point' => 76,
            'maximum_point' => 100
        ]);

        PointCondition::factory()->create([
            'condition_name' => 'Peringatan ke 3 (wali kelas, guru BK, dan K3)',
            'minimum_point' => 101,
            'maximum_point' => 200
        ]);

        PointCondition::factory()->create([
            'condition_name' => 'Dikembalikan ke orang tua (kepala sekolah)',
            'minimum_point' => 201,
            'maximum_point' => 500
        ]);
    }
}
