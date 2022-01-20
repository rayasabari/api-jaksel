<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        collect(
            [
                [
                    "name" => "Raya Sabari",
                    "email" => "hi@rayasabari.com",
                    "password" => bcrypt('password'),
                    "email_verified_at" => now()
                ],
                [
                    "name" => "Eva Holillah",
                    "email" => "eva@rayasabari.com",
                    "password" => bcrypt('password'),
                    "email_verified_at" => now()
                ],
                [
                    "name" => "Andromeda PH",
                    "email" => "ado@rayasabari.com",
                    "password" => bcrypt('password'),
                    "email_verified_at" => now()
                ]
            ]
        )->each(function ($user) {
            User::create($user);
        });

        collect([
            'admin','moderator'
        ])->each(function ($role){
            Role::create(['name' => $role]);
        });

        User::find(1)->roles()->attach([1]);
        User::find(2)->roles()->attach([2]);
        User::find(3)->roles()->attach([2]);
    }
}
