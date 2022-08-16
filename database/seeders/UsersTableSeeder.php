<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $password = env('ADMIN_PASSWORD');

        if (empty($password)) {
            throw new \Exception('Please add an `ADMIN_PASSWORD` value to your `.env` file for the admin user!');
        }

        User::create([
            'name' => 'super',
            'surname' => 'admin',
            'username' => 'admin',
            'email' => 'admin@example.com',
            'rsa_id' => '800516 5800 088',
            'mobile_number' => '083 123 4567',
            'date_of_birth' => '1980-05-16',
            'language_id' => '1',
            'password' => Hash::make($password),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
