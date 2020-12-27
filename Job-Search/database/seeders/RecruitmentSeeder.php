<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Generator;
use Faker\Factory;
use App\Models\Recruitment;

class RecruitmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        $n = 0;
        /* Add Recruitment Default */
        for ($i = 0; $i < $n; $i++) {
            $recruitment = new Recruitment();

            $recruitment->company_id = $faker->numberBetween($min = 1, $max = 20);
            $recruitment->title = $faker->jobTitle;
            $recruitment->apply_for = $faker->jobTitle;
            $recruitment->salary = $faker->numberBetween($min = 500, $max = 9999);

            $recruitment->save();
        }

        Recruitment::factory(20)->create();
    }
}
