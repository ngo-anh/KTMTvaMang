<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Generator;
use Faker\Factory;
use App\Models\CurriculumVitae;

class CurriculumVitaeSeeder extends Seeder
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
        /* Add CV Default */
        for ($i = 0; $i < $n; $i++) {
            $cv = new CurriculumVitae();

            $cv->user_id = $faker->numberBetween($min = 1, $max = 20);
            $cv->title = $faker->jobTitle;
            $cv->apply_position = $faker->jobTitle;

            $cv->save();
        }
        CurriculumVitae::factory(20)->create();
    }
}
