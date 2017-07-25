<?php

use Illuminate\Database\Seeder;
use App\Cohort;

class CohortsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cohort::create(
            [
                'startyear' => '2014',
                'endyear' => '2017',
            ]);
    }
}
