<?php

use Illuminate\Database\Seeder;
use App\Company;

class CompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Company::create(
            [
                'name' => 'MaxPerfection',
                'phonenumber' => '06-66655544'
            ]);

        Company::create(
            [
                'name' => 'Dingladoo',
                'phonenumber' => '06-31255544'
            ]);

    }
}
