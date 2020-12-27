<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Faker\Generator;
use Faker\Factory;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        $n = 1;

        /* Add Admin Default */
        for ($i = 0; $i < $n; $i++) {
            $user = new User();

            $user->name = $faker->name;
            $user->email = "admin@gmail.com";
            $user->email_verified_at = now();
            $user->password = Hash::make('password');
            $user->role_id = 1;
            $user->status = 1;
            $user->phone_number = $faker->e164PhoneNumber;
            $user->address = $faker->address;
            $user->date_of_birth = now();
            $user->gender_id = $faker->numberBetween($min = 1, $max = 3);
            $user->remember_token = Str::random(64);

            $user->save();
        }

        /* Add User Default */
        for ($i = 0; $i < $n; $i++) {
            $user = new User();

            $user->name = $faker->name;
            $user->email = "user@gmail.com";
            $user->email_verified_at = now();
            $user->password = Hash::make('password');
            $user->role_id = 2;
            $user->status = 1;
            $user->phone_number = $faker->e164PhoneNumber;
            $user->address = $faker->address;
            $user->date_of_birth = now();
            $user->gender_id = $faker->numberBetween($min = 1, $max = 3);
            $user->remember_token = Str::random(64);

            $user->save();
        }

        User::factory(18)->create();
    }
}
