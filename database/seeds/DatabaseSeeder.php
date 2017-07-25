<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolesTableSeeder::class);
        $this->call(CompaniesTableSeeder::class);
        $this->call(ContactsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(SchoolsTableSeeder::class);
        $this->call(CrebosTableSeeder::class);
        $this->call(CohortsTableSeeder::class);
        $this->call(CategorieTableSeeder::class);
        $this->call(StatusesTableSeeder::class);
        $this->call(LocationsTableSeeder::class);
        $this->call(Education_offersTableSeeder::class);
        $this->call(ToolsTableSeeder::class);
        $this->call(InternshipsTableSeeder::class);
        $this->call(Internship_usersTableSeeder::class);
        $this->call(AddressesTableSeeder::class);
        $this->call(InternshiptoolsTableSeeder::class);
        $this->call(ReviewsTableSeeder::class);
    }
}
