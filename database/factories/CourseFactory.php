<?php

namespace Database\Factories;

use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'department_id' => $this->faker->numberBetween(1, 4),
            'title' => $this->faker->word(),
            'code' => $this->faker->unique()->word(),
            'level' => 100,
            'semester' => 'first',
            'unit' => $this->faker->numberBetween(1, 4),

        ];
    }

    protected $model = Course::class;
}
