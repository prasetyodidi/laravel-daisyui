<?php

namespace Database\Seeders;

use App\Models\StudentClass;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $alphabets = range('A', 'Z');
        $classes = [];

        foreach ($alphabets as $alphabet) {
            $classes[] = [
                'class_name' => $alphabet
            ];
        }

        StudentClass::query()->insert($classes);
    }
}
