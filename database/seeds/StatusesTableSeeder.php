<?php

use Illuminate\Database\Seeder;
use App\Status;

class StatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Status::create(
            [
                'name' => 'Public',
                'categorie_id' => '1'
            ]);
        Status::create(
            [
                'name' => 'Private',
                'categorie_id' => '1'
            ]);
        Status::create(
            [
                'name' => 'pending',
                'categorie_id' => '2'
            ]);
        Status::create(
            [
                'name' => 'acknowledge',
                'categorie_id' => '2'
            ]);

        Status::create(
            [
                'name' => 'searching',
                'categorie_id' => '3'
            ]);
        Status::create(
            [
                'name' => 'in progress',
                'categorie_id' => '3'
            ]);
        Status::create(
            [
                'name' => 'done',
                'categorie_id' => '3'
            ]);
    }
}
