<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::insert([
            [
                'name' => 'User1',
                'email' => 'user1@example.com',
                'password' => bcrypt(12345678)
            ],
            [
                'name' => 'User2',
                'email' => 'User2@example.com',
                'password' => bcrypt(12345678)
            ]
        ]);
    }
}
