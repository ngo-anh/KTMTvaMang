<?php

namespace Database\Factories;

use App\Models\Recruitment;
use Illuminate\Database\Eloquent\Factories\Factory;

class RecruitmentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Recruitment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'company_id' =>
            $this->faker->numberBetween($min = 1, $max = 20),
            'title' => $this->faker->jobTitle,
            'apply_for' => $this->faker->jobTitle,
            'salary' => $this->faker->numberBetween($min = 500, $max = 9999)
        ];
    }
}
