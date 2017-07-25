<?php

use Illuminate\Database\Seeder;
use App\Location;

class LocationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Location::create(
            [
                'school_id' => '1',
            ]);

        Location::create(
            [
                'school_id' => '2',
            ]);

    }
}
