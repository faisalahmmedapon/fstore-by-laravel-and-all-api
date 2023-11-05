<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = array(
            [
                'name' => 'User',
                'email' => 'user@gmail.com',
                'password' => Hash::make('12345678'),
                'email_verified_at' => now(),
            ],
            ['name' => 'Thomas Henry',
                'email' => 'thomashenry@gmail.com',
                'password' => Hash::make('12345678'),
                'email_verified_at' => now(),
            ], [
                'name' => 'Harrision Samuel',
                'email' => 'harrisionsamuel@gmail.com',
                'password' => Hash::make('12345678'),
                'email_verified_at' => now(),
            ], [
                'name' => 'Alexandar James',
                'email' => 'alexandarjames@gmail.com',
                'password' => Hash::make('12345678'),
                'email_verified_at' => now(),
            ],
        );
        foreach ($users as $user) {
            $user =  User::updateOrCreate($user);
            $user->assignRole('user');
        }

    }
}
