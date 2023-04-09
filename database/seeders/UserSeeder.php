<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {

        $user = User::factory()->create([
            'name' => 'Super Admin',
            'email' => 'super@example.com',
        ]);

        $user->assignRole('Super Admin');

        $user = User::factory()->create([
            'name' => 'Test Admin',
            'email' => 'admin@example.com',
        ]);

        $user->assignRole('Admin');

        $user = User::factory()->create([
            'name' => 'Test Teacher',
            'email' => 'teacher@example.com',
        ]);

        $user->assignRole('Teacher');
    }
}
