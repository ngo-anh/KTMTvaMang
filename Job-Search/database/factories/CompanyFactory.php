<?php

namespace Database\Factories;

use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;

class CompanyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Company::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->numberBetween($min = 1, $max = 20),
            'name' => $this->faker->company,
            'description' => $this->faker->paragraph($nbSentences = 3, $variableNbSentences = true),
            'address' => $this->faker->address,
            'image_path' => '/images/companies/default.png'
        ];
    }
}
