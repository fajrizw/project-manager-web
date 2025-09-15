<?php

namespace Database\Seeders;

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
            [
                'name' => 'Admin User',
                'email' => 'admin@example.com',
                'password' => Hash::make('password'),
                'role_id' => 1, // admin
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Project Manager',
                'email' => 'pm@example.com',
                'password' => Hash::make('password'),
                'role_id' => 2, // project_manager
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Team Member',
                'email' => 'member@example.com',
                'password' => Hash::make('password'),
                'role_id' => 3, // member
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
