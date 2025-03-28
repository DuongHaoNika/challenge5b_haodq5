<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ChallengeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $challenges = [
            [
                'teacher_id' => 1,
                'challenge_hint' => 'Look for the flag in the source code comments',
                'file_path' => 'challenges/web_security_1.zip',
                'file_content' => 'This file contains a simple web application with vulnerabilities',
                'created_at' => Carbon::now(),
            ],
            [
                'teacher_id' => 2,
                'challenge_hint' => 'The password is hashed with MD5',
                'file_path' => 'challenges/crypto_challenge.pdf',
                'file_content' => 'A document containing encrypted messages to decode',
                'created_at' => Carbon::now(),
            ],
            [
                'teacher_id' => 1,
                'challenge_hint' => 'Check the network requests in developer tools',
                'file_path' => 'challenges/api_challenge.json',
                'file_content' => 'API endpoint with hidden endpoints to discover',
                'created_at' => Carbon::now(),
            ],
            [
                'teacher_id' => 2,
                'challenge_hint' => 'The solution involves a recursive function',
                'file_path' => 'challenges/algorithm_task.js',
                'file_content' => 'JavaScript file with an incomplete algorithm to complete',
                'created_at' => Carbon::now(),
            ],
            [
                'teacher_id' => 1,
                'challenge_hint' => 'Inspect the cookies and local storage',
                'file_path' => 'challenges/web_challenge.html',
                'file_content' => 'HTML file with hidden flags in different storage locations',
                'created_at' => Carbon::now(),
            ],
            [
                'teacher_id' => 2,
                'challenge_hint' => 'The answer is in the EXIF data',
                'file_path' => 'challenges/image_analysis.jpg',
                'file_content' => 'Image file containing hidden metadata',
                'created_at' => Carbon::now(),
            ],
        ];

        foreach ($challenges as $challenge) {
            DB::table('challenges')->insert($challenge);
        }
    }
}