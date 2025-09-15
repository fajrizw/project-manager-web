<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('projects')->insert([
            [
                'title' => 'Website Redesign',
                'description' => 'Revamp company website with modern design',
                'start_date' => now(),
                'end_date' => now()->addMonths(2),
                'created_by' => 2, // project manager
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Mobile App Development',
                'description' => 'Build cross-platform mobile app',
                'start_date' => now(),
                'end_date' => now()->addMonths(3),
                'created_by' => 2, // project manager
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
