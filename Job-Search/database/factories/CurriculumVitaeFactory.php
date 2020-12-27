<?php

namespace Database\Factories;

use App\Models\CurriculumVitae;
use Illuminate\Database\Eloquent\Factories\Factory;

class CurriculumVitaeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CurriculumVitae::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->numberBetween($min = 1, $max = 20),
            'title' => $this->faker->jobTitle,
            'apply_position' => $this->faker->jobTitle
        ];
    }
}
