<?php

namespace App\Policies;

use App\Models\Job;
use App\Models\User;

class JobPolicy
{
    /**
     * Determine whether the user can update or delete the model.
     */
    public function modify(User $user, Job $job): bool
    {
        return $job->employer->user->is($user);
    }
}
