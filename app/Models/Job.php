<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Job extends Model
{
    use HasFactory;

    protected $table = 'job_listings';
    protected $fillable = [
        'employer_id',
        'title',
        'salary',
    ];

    /**
     * Get the employer that owns the Job
     *
     * @return BelongsTo
     */
    public function employer(): BelongsTo
    {
        return $this->belongsTo(Employer::class);
    }

    /**
     * Get the user that owns the Job
     *
     * @return BelongsTo
     */
    public function employerUser(): BelongsTo
    {
        return $this->belongsTo(User::class, 'employer_id');
    }

    /**
     * The tags that belong to the Job
     *
     * @return BelongsToMany
     */
    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class, foreignPivotKey: 'job_listing_id');
    }
}
