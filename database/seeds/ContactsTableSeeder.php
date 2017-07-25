<?php

use Illuminate\Database\Seeder;
use App\Contact;

class ContactsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Contact::create(
            [
                'surename' => 'pieters',
                'firstname' => 'Tapas',
                'email' => 'admin@admin.nl',
                'phonenumber' => '0622233311',
            ]);

        Contact::create(
            [
                'surename' => 'kappa',
                'firstname' => 'Terro',
                'email' => 'student@kappa.kp',
                'phonenumber' => '0622233311',
            ]);

        Contact::create(
            [
                'surename' => 'kappa',
                'firstname' => 'Terro',
                'email' => 'student@kappa.kp',
                'phonenumber' => '0622233311',
                'school_id' => 1,
            ]);

        Contact::create(
            [
                'surename' => 'Karakoc',
                'firstname' => 'Oguzcan',
                'email' => 'teacher@kappa.kp',
                'phonenumber' => '0622233311',
                'school_id' => 1,
            ]);

        Contact::create(
            [
                'surename' => 'Ryan',
                'firstname' => 'Hogenboom',
                'email' => 'practical@practical.nl',
                'phonenumber' => '0622233311',
                'company_id' => 1,
            ]);

    }
}
