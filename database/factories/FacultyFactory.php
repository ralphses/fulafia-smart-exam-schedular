<?php

namespace Database\Factories;

use App\Models\Faculty;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Faculty>
 */
class FacultyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'school_id' => $this->faker->numberBetween(1, 1),
            'name' => $this->faker->word(),
            'active' => $this->faker->boolean(70)
        ];
    }

    protected $model = Faculty::class;
}
