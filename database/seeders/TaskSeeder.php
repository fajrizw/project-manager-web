<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tasks')->insert([
            [
                'project_id' => 1,
                'assigned_to' => 3, // member
                'title' => 'Design homepage mockup',
                'description' => 'Create UI mockup for homepage',
                'status' => 'in_progress',
                'due_date' => now()->addWeek(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'project_id' => 2,
                'assigned_to' => 3, // member
                'title' => 'Setup project structure',
                'description' => 'Initialize mobile app codebase',
                'status' => 'pending',
                'due_date' => now()->addDays(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
