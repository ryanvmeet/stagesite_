<?php

use Illuminate\Database\Seeder;
use App\Role;
class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(
            [
                'role' => 'admin'
            ]);
        Role::create(
            [
                'role' => 'user'
            ]);
        Role::create(
            [
                'role' => 'student'
            ]);
        Role::create(
            [
                'role' => 'teacher'
            ]);
        Role::create(
            [
                'role' => 'practical trainer'
            ]);

    }
}