<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Employer extends Model
{
    use HasFactory;

    /**
     * Get the jobs owned by the employer.
     *
     * @return HasMany relation
     */
    public function jobs(): HasMany
    {
        return $this->hasMany(Job::class);
    }
}
