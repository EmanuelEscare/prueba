<?php

namespace Database\Factories;

use App\Enums\StudentGender;
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
    public function definition()
    {
        return [
            'name' => $this->faker->firstName,
            'lastname' => $this->faker->lastName,
            'code' => $this->faker->unique()->randomNumber(8),
            'email' => $this->faker->unique()->safeEmail,
            'phone' => $this->faker->phoneNumber,
            'address' => $this->faker->address,
            'birth_date' => $this->faker->date(),
            'entry_date' => $this->faker->date(),
            'gender' => self::getRandomGender(),
        ];
    }

    private function getRandomGender(): string
    {
        return match (rand(0, 1)) {
            0 => StudentGender::MALE->value,
            1 => StudentGender::FEMALE->value,
        };
    }
}
