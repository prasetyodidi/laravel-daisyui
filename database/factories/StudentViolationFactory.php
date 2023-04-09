<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\StudentViolation>
 */
class StudentViolationFactory extends Factory
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
            'violations_id' => fake()->numberBetween(1, 17),
            'reported_by' => fake()->randomNumber(),
            'violated_at' => fake()->dateTimeThisDecade
        ];
    }
}
