<?php

use Illuminate\Database\Seeder;
use App\Internshiptool;

class InternshiptoolsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Internshiptool::create(
            [
                'company_id' => 1,
                'internship_user_id' => 1,
                'tool_id' => 1,
            ]);
    }
}
