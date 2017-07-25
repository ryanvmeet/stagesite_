<?php

use Illuminate\Database\Seeder;
use App\School;

class SchoolsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        School::create(
            [
                'name' => 'Zadkine',
            ]);
        School::create(
            [
                'name' => 'Albeda',
            ]);
    }
}
