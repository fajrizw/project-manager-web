<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         DB::table('roles')->insert([
            ['name' => 'admin', 'description' => 'Super user with full access', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'project_manager', 'description' => 'Can manage projects and tasks', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'member', 'description' => 'Regular user assigned to tasks', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
