<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roleMap = Role::pluck('id', 'name');

        User::updateOrCreate(
            ['email' => 'admin@strathfind.app'],
            [
                'name' => 'Demo Admin',
                'phone' => '+254700000001',
                'role_id' => $roleMap['admin'] ?? null,
                'password' => Hash::make('password'),
            ],
        );

        User::updateOrCreate(
            ['email' => 'staff@strathfind.app'],
            [
                'name' => 'Demo Staff',
                'phone' => '+254700000002',
                'role_id' => $roleMap['staff'] ?? null,
                'password' => Hash::make('password'),
            ],
        );

        User::updateOrCreate(
            ['email' => 'student@strathfind.app'],
            [
                'name' => 'Demo Student',
                'phone' => '+254700000003',
                'role_id' => $roleMap['student'] ?? null,
                'password' => Hash::make('password'),
            ],
        );
    }
}
