<?php

namespace Database\Factories;

use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory
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
            'name' => $this->faker->sentence(2),
            'matric' => $this->faker->unique()->numberBetween(1000000, 4000000),
            'email' => $this->faker->email(),
            'level' => 400,
            'fees' => $this->faker->unique()->word(),
            'school_id' => 1,
            'faculty_id' => $this->faker->numberBetween(1, 4),
            'department_id' => $this->faker->numberBetween(1, 84)
        ];
    }

    protected $model = Student::class;
}
