<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'super',
            'surname' => 'admin',
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'rsa_id' => '7710245800088',
            'mobile_number' => '083-123-4567',
            'date_of_birth' => '1977-10-24',
            'language_id' => '1',
            'password' => Hash::make('password'),       //  TODO: Get the admin password from an .env or config file !?!?
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
