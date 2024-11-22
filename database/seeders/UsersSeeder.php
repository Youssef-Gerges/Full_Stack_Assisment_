<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'general user',
            'email' => 'general@user.com',
            'password' => bcrypt('123456789'),
            'access_type' => 'general',
        ]);

        User::create([
            'name' => 'motors user',
            'email' => 'motors@user.com',
            'password' => bcrypt('123456789'),
            'access_type' => 'motors',
        ]);


        User::create([
            'name' => 'jobs user',
            'email' => 'jobs@user.com',
            'password' => bcrypt('123456789'),
            'access_type' => 'jobs',
        ]);

    }
}
