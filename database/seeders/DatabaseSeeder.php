<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Admins;

use Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        Admins::create([
            "f_name" => "admin",
            "l_name" => "admin",
            "username" => "admin",
            "password" => Hash::make("admin"),
            "email" => "pylonglobal@gmail.com",
            "plain_password" => "admin"
        ]);
    }
}
