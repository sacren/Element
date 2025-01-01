<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Travel>
 */
class EmployerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $users = User::all();

        if ($users->isEmpty()) {
            User::factory(6)->create();
            $users = User::all();
        }

        return [
            'name' => fake()->company(),
            'user_id' => fn () => $users->random()->id,
        ];
    }
}
