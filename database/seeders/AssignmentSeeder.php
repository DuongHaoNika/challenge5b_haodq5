<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AssignmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $assignments = [
            [
                'teacher_id' => 1,
                'title' => 'Laravel Basics Assignment',
                'description' => 'Create a simple Laravel CRUD application for a blog system.',
                'file_path' => 'assignments/laravel_basics.pdf',
                'deadline' => Carbon::now()->addDays(7),
            ],
            [
                'teacher_id' => 2,
                'title' => 'Database Design Project',
                'description' => 'Design a database schema for an e-commerce platform.',
                'file_path' => 'assignments/database_design.pdf',
                'deadline' => Carbon::now()->addDays(10),
            ],
            [
                'teacher_id' => 1,
                'title' => 'JavaScript Fundamentals',
                'description' => 'Complete the JavaScript exercises covering functions, arrays and objects.',
                'file_path' => 'assignments/javascript_fundamentals.pdf',
                'deadline' => Carbon::now()->addDays(5),
            ],
            [
                'teacher_id' => 2,
                'title' => 'CSS Layout Challenge',
                'description' => 'Create responsive layouts using Flexbox and CSS Grid.',
                'file_path' => 'assignments/css_layout.pdf',
                'deadline' => Carbon::now()->addDays(3),
            ],
            [
                'teacher_id' => 1,
                'title' => 'Final Project Proposal',
                'description' => 'Submit your proposal for the final project including scope and technologies.',
                'file_path' => 'assignments/final_project.pdf',
                'deadline' => Carbon::now()->addDays(14),
            ],
            [
                'teacher_id' => 2,
                'title' => 'API Development Task',
                'description' => 'Build a RESTful API with authentication using Laravel Sanctum.',
                'file_path' => 'assignments/api_development.pdf',
                'deadline' => Carbon::now()->addDays(12),
            ],
        ];

        foreach ($assignments as $assignment) {
            DB::table('assignments')->insert($assignment);
        }
    }
}