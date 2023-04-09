<?php

namespace Database\Factories;

use App\Enums\Gender;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = \Faker\Factory::create('id_ID');
        $isMale = $faker->boolean;
        return [
            'classes_id' => $faker->numberBetween(1, 20),
            'student_id_number' => $faker->numerify('#####/###.###'),
            'name' => $isMale ? $faker->name('male') : $faker->name('female'),
            'address' => $faker->address,
            'gender' =>$isMale ? Gender::Man->value : Gender::Women->value
        ];
    }
}
