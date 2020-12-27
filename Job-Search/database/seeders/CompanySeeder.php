<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Generator;
use Faker\Factory;
use App\Models\Company;

class CompanySeeder extends Seeder
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
        /* Add Company Default */
        for ($i = 0; $i < $n; $i++) {
            $company = new Company();

            $company->user_id = 1;
            $company->name = $faker->company;
            $company->description = $faker->paragraph($nbSentences = 3, $variableNbSentences = true);
            $company->address = $faker->address;
            $company->image_path = '/images/companies/default.png';

            $company->save();
        }

        Company::factory(19)->create();
    }
}
