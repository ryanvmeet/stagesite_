<?php

use Illuminate\Database\Seeder;
use \App\Categorie;

class CategorieTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Categorie::create(
            [
                'name' => 'review',
            ]);
        Categorie::create(
            [
                'name' => 'tools',
            ]);
        Categorie::create(
            [
                'name' => 'internship',
            ]);
    }
}
