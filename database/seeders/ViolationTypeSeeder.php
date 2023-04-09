<?php

namespace Database\Seeders;

use App\Models\ViolationType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ViolationTypeSeeder extends Seeder
{
    public function run(): void
    {
        ViolationType::factory()->create([
            'violation_type_name' => 'Sikap Perilaku'
        ]);

        ViolationType::factory()->create([
            'violation_type_name' => 'Kerajinan'
        ]);

        ViolationType::factory()->create([
            'violation_type_name' => 'Kerapian'
        ]);
    }
}
