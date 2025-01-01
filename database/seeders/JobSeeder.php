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
        Job::factory(50)->create([
            'employer_id' => fn () => Employer::all()->random()->id,
        ]);
    }
}
