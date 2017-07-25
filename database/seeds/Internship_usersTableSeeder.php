<?php

use Illuminate\Database\Seeder;
use App\InternshipUser;

class Internship_usersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        InternshipUser::create(
            [
                'user_id' => 3,
                'internship_id' => 1,
            ]);

    }
}
