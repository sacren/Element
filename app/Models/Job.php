<?php

namespace App\Models;

use Database\Factories\DoohickeyFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Job extends Model
{
    use HasFactory;

    protected $table = 'job_listings';
    protected $fillable = [
        'title',
        'salary',
    ];

    /**
     * Create a new factory instance for this model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory()
    {
        return DoohickeyFactory::new();
    }
}
