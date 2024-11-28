<?php

namespace App\Models;

use Illuminate\Support\Arr;

class Job
{
    /**
     * Get all jobs
     *
     * @return array of all jobs
     */
    public static function all(): array
    {
        return [
            [
                'id' => 1,
                'title' => 'Photographer',
                'salary' => '$50,000',
            ],
            [
                'id' => 2,
                'title' => 'Mason',
                'salary' => '$25,000',
            ],
            [
                'id' => 3,
                'title' => 'Sous Chef',
                'salary' => '$75,000',
            ],
        ];
    }

    /**
     * Find the job by its ID
     *
     * @param the job ID, can be int or string
     *
     * @return array of the job
     */
    public static function find(int|string $id): array
    {
        $job = Arr::first(self::all(), fn ($job) => $job['id'] == $id);

        if (! $job) {
            abort(404);
        }

        return $job;
    }
}
