<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $messages = [
            // Conversation between teacher1 and student1
            [
                'sender_id' => 1,
                'receiver_id' => 3,
                'content' => 'Hi Student One, have you started working on the Laravel assignment yet?',
                'created_at' => Carbon::now()->subHours(3),
                'updated_at' => Carbon::now()->subHours(3),
            ],
            [
                'sender_id' => 4,
                'receiver_id' => 1,
                'content' => 'Yes, Teacher One! I\'ve completed about half of it. Should I submit what I have so far?',
                'created_at' => Carbon::now()->subHours(2),
                'updated_at' => Carbon::now()->subHours(2),
            ],
            
            // Conversation between teacher2 and student2
            [
                'sender_id' => 2,
                'receiver_id' => 4,
                'content' => 'Student Two, I noticed you missed the last challenge submission. Is everything okay?',
                'created_at' => Carbon::now()->subDays(1),
                'updated_at' => Carbon::now()->subDays(1),
            ],
            [
                'sender_id' => 4,
                'receiver_id' => 2,
                'content' => 'Sorry Teacher Two, I had some internet issues. I\'ll submit it by tonight!',
                'created_at' => Carbon::now()->subHours(20),
                'updated_at' => Carbon::now()->subHours(20),
            ],
            [
                'sender_id' => 3,
                'receiver_id' => 4,
                'content' => 'Of course! The main goal is to implement proper authentication. Check the updated guidelines I shared.',
                'created_at' => Carbon::now()->subHours(4),
                'updated_at' => Carbon::now()->subHours(4),
            ],
        ];

        foreach ($messages as $message) {
            DB::table('messages')->insert($message);
        }
    }
}