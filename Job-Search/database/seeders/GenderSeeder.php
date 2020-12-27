<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Gender;

class GenderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Gender::create([
            'name' => 'male'
        ])->save();

        Gender::create([
            'name' => 'female'
        ])->save();

        Gender::create([
            'name' => 'other'
        ])->save();
    }
}
