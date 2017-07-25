<?php

use Illuminate\Database\Seeder;
use App\Review;

class ReviewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Review::create(
            [
                'review' => 'dit is een review',
                'mark' => 10,
                'status_id' => 1,
                'internship_user_id' => 1,
            ]);

    }
}
