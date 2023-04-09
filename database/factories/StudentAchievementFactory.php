<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\StudentAchievement>
 */
class StudentAchievementFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'students_id' => fake()->numberBetween(1, 600),
            'achievements_id' => fake()->numberBetween(1, 8),
            'reported_by' => fake()->randomNumber(),
            'achieved_at' => fake()->dateTimeThisDecade
        ];
    }
}
