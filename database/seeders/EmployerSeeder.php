<?php

namespace Database\Seeders;

use App\Models\Employer;
use App\Models\User;
use Illuminate\Database\Seeder;

class EmployerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();

        if ($users->isEmpty()) {
            User::factory(10)->create();
            $users = User::all();
        }

        Employer::factory(10)->create([
            'user_id' => fn () => $users->random()->id,
        ]);
    }
}
