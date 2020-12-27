<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->call(RoleSeeder::class);
        $this->call(GenderSeeder::class);

        $this->call(UserSeeder::class);
        $this->call(CompanySeeder::class);
        $this->call(RecruitmentSeeder::class);
        $this->call(CurriculumVitaeSeeder::class);
    }
}
