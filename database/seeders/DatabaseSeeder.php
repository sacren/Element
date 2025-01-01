<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed users and other database tables.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        $this->call(EmployerSeeder::class);
        $this->call(JobSeeder::class);
        $this->call(TagSeeder::class);
        $this->call(JobTagSeeder::class);
    }
}
