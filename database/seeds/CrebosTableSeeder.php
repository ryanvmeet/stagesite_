<?php

use Illuminate\Database\Seeder;
use App\Crebo;

class CrebosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Crebo::create(
            [
                'name' => 'applicatie ontwikkelaar',
                'number' => 95311,
            ]);

    }
}
