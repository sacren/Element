<?php

namespace Database\Seeders;

use App\Models\Employer;
use App\Models\Job;
use Illuminate\Database\Seeder;

class JobSeeder extends Seeder
{
    /**
     * Seed employers and job_listings database tables.
     */
    public function run(): void
    {
        $employers = Employer::factory(10)->create();

        Job::factory()->count(50)->create([
            'employer_id' => fn () => $employers->random()->id,
        ]);
    }
}
