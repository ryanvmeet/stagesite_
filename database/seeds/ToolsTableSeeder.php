<?php

use Illuminate\Database\Seeder;
use App\Tool;

class ToolsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tool::create(
            [
                'name' => 'php',
                'description' => 'PHP is een reg belangerijke tool om te kunnen coderen voor op het web',
                'status_id' => 4,
            ]);
        Tool::create(
            [
                'name' => 'Javascript',
                'description' => 'Javascript is een reg belangerijke tool om te kunnen coderen voor op het web',
                'status_id' => 4,
            ]);
        Tool::create(
            [
                'name' => 'Laravel',
                'description' => 'Laravel is een MVC frameswork',
                'status_id' => 3,
            ]);
    }
}
