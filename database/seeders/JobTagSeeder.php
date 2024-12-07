<?php

namespace Database\Seeders;

use App\Models\Job;
use Illuminate\Database\Seeder;

class JobTagSeeder extends Seeder
{
    /**
     * Seed job_tag pivot table.
     */
    public function run(): void
    {
        $job = Job::find(10);
        if ($job) {
            $job->tags()->attach(3);
        }

        $job = Job::find(6);
        if ($job) {
            $job->tags()->attach([1, 8]);
        }
    }
}
