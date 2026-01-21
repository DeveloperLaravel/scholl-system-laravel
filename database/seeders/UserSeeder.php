<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
           // Admin User
        User::firstOrCreate(
            ['email' => 'hnarfr20063@gmail.com'],
            [
                'name' => 'abbes',
                'role' => 'admin',
                'email_verified_at' => now(),
                'password' => Hash::make('love308277'), // غيّرها لاحقًا
                'remember_token' => Str::random(10),
            ]
        );

        // Employee User
        User::firstOrCreate(
            ['email' => 'aaa@aaa.com'],
            [
                'name' => 'Employee',
                'role' => 'employee',
                'email_verified_at' => now(),
                'password' => Hash::make('12345678'),
                'remember_token' => Str::random(10),
            ]
        );
    }
}
