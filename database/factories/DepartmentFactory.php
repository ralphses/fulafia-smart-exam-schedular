<?php

namespace Database\Factories;

use App\Models\Department;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Department>
 */
class DepartmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'faculty_id' => $this->faker->numberBetween(1, 4),
            'name' => $this->faker->sentence(2),
            'active' => $this->faker->boolean(65),
        ];
    }

    protected $model = Department::class;
}
