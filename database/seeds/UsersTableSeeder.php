<?php

use Illuminate\Database\Seeder;
use App\User;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create(
            [
                'validation' => 1,
                'email' => 'admin@admin.nl',
                'password' => bcrypt('password'),
                'role_id' => 1,
                'contact_id' => 1
            ]);

        User::create(
            [
                'validation' => 0,
                'email' => 'user@user.nl',
                'password' => bcrypt('password'),
                'role_id' => 2,
                'contact_id' => 2
            ]);

        User::create(
            [
                'validation' => 0,
                'email' => 'student@student.nl',
                'password' => bcrypt('password'),
                'contact_id' => 3,
                'role_id' => 3
            ]);

        User::create(
            [
                'validation' => 0,
                'email' => 'teacher@teacher.nl',
                'password' => bcrypt('password'),
                'contact_id' => 4,
                'role_id' => 4
            ]);


        User::create(
            [
                'validation' => 0,
                'email' => 'practical@practical.nl',
                'password' => bcrypt('password'),
                'contact_id' => 5,
                'role_id' => 5
            ]);
    }
}
