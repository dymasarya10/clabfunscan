<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Operator extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    /**
     * Get the user that owns the Operator
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Get the education_level that owns the Operator
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function education_level(): BelongsTo
    {
        return $this->belongsTo(EducationLevel::class, 'education_level_id');
    }
}
