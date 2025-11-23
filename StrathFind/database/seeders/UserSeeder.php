<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create Admin User
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@strathmore.edu',
            'phone' => '0700000000',
            'password' => Hash::make('password123'),
            'role_id' => 1, // admin role
        ]);

        // Create Student User
        User::create([
            'name' => 'John Doe',
            'email' => 'student@strathmore.edu',
            'phone' => '0711111111',
            'password' => Hash::make('password123'),
            'role_id' => 2, // student role
        ]);

        // Create Staff User
        User::create([
            'name' => 'Jane Smith',
            'email' => 'staff@strathmore.edu',
            'phone' => '0722222222',
            'password' => Hash::make('password123'),
            'role_id' => 3, // staff role
        ]);
    }
}