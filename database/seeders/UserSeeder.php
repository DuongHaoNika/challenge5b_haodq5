<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $specificUsers = [
            [
                'username' => 'teacher1',
                'password' => '$2y$10$ExIrGI3q9jPoj.TFO2V6MOTuwLMqC67DhGesU/nLWS6xIps/.CWlm',
                'full_name' => 'Giáo viên 1',
                'email' => 'teacher1@example.com',
                'phone' => '0123456789',
                'role' => 'teacher',
                'avatar' => 'https://i.pinimg.com/originals/79/9a/eb/799aeb4038a89b85afa4411c7e4c668c.jpg',
            ],
            [
                'username' => 'teacher2',
                'password' => '$2y$10$ExIrGI3q9jPoj.TFO2V6MOTuwLMqC67DhGesU/nLWS6xIps/.CWlm',
                'full_name' => 'Giáo viên 2',
                'email' => 'teacher2@example.com',
                'phone' => '0123456790',
                'role' => 'teacher',
                'avatar' => 'https://i.pinimg.com/originals/79/9a/eb/799aeb4038a89b85afa4411c7e4c668c.jpg',
            ],
            [
                'username' => 'student1',
                'password' => '$2y$10$ExIrGI3q9jPoj.TFO2V6MOTuwLMqC67DhGesU/nLWS6xIps/.CWlm',
                'full_name' => 'Học sinh 1',
                'email' => 'student1@example.com',
                'phone' => '0123456791',
                'role' => 'student',
                'avatar' => 'https://i.pinimg.com/originals/79/9a/eb/799aeb4038a89b85afa4411c7e4c668c.jpg',
            ],
            [
                'username' => 'student2',
                'password' => '$2y$10$ExIrGI3q9jPoj.TFO2V6MOTuwLMqC67DhGesU/nLWS6xIps/.CWlm',
                'full_name' => 'Học sinh 2',
                'email' => 'student2@example.com',
                'phone' => '0123456792',
                'role' => 'student',
                'avatar' => 'https://i.pinimg.com/originals/79/9a/eb/799aeb4038a89b85afa4411c7e4c668c.jpg',
            ],
            [
                'username' => 'admin',
                'password' => '$2y$10$ExIrGI3q9jPoj.TFO2V6MOTuwLMqC67DhGesU/nLWS6xIps/.CWlm',
                'full_name' => 'Quản trị viên',
                'email' => 'admin@example.com',
                'phone' => '0123456793',
                'role' => 'admin',
                'avatar' => 'https://i.pinimg.com/originals/79/9a/eb/799aeb4038a89b85afa4411c7e4c668c.jpg',
            ],
        ];

        foreach ($specificUsers as $user) {
            User::create($user);
        }

    }
}
