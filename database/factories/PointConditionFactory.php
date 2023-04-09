<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PointCondition>
 */
class PointConditionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $minimumPoint = fake()->randomNumber();
        return [
            'condition_name' => fake()->words(5, true),
            'minimum_point' => $minimumPoint,
            'maximum_point' => $minimumPoint + 30,
        ];
    }
}
