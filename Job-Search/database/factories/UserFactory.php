<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'role_id' => $this->faker->numberBetween($min = 1, $max = 2),
            'status' => $this->faker->numberBetween($min = 0, $max = 1),
            'phone_number' => $this->faker->e164PhoneNumber,
            'address' => $this->faker->address,
            'date_of_birth' => now(),
            'gender_id' => $this->faker->numberBetween($min = 1, $max = 3),
            'remember_token' => Str::random(64)
        ];
    }
}
