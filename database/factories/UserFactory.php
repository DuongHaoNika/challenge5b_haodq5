<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserFactory extends Factory
{
    protected $model = User::class;

    public function definition()
    {
        return [
            'username' => $this->faker->unique()->userName,
            'password' => '$2y$10$ExIrGI3q9jPoj.TFO2V6MOTuwLMqC67DhGesU/nLWS6xIps/.CWlm', // password
            'full_name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'phone' => $this->faker->phoneNumber,
            'role' => $this->faker->randomElement(['teacher', 'student', 'admin']),
            'avatar' => 'https://i.pinimg.com/originals/79/9a/eb/799aeb4038a89b85afa4411c7e4c668c.jpg',
            'created_at' => now(),
        ];
    }
}