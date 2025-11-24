<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = collect(['student', 'staff', 'admin']);

        $roles->each(fn (string $role) => Role::firstOrCreate(['name' => $role]));
    }
}
