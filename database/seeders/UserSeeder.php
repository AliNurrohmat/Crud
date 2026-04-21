<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'npm' => 5520123024,
            'username' => 'User 1',
            'first_name' => 'User',
            'last_name' => '1',
            'email' => 'user1@gmail.com',
            'password' => Hash::make('password123'),
        ]);
    }
}
