<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class MonitorFactory extends Factory
{
    public function definition(): array
    {
        return [
            'url' => $this->faker->url(),
            'user_id' => User::factory(),
        ];
    }
}
