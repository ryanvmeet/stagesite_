<?php

use Illuminate\Database\Seeder;
use App\Education_offer;

class Education_offersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Education_offer::create(
            [
                'name' => 1234,
                'cohort_id' => 1,
                'location_id' => 1,
                'crebo_id' => 1,
            ]);
    }
}
