<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class EducationLevel extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    /**
     * Get the teacher associated with the EducationLevel
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function teacher(): HasOne
    {
        return $this->hasOne(Teacher::class, 'education_level_id', 'id');
    }

    /**
     * Get the operator associated with the EducationLevel
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function operator(): HasOne
    {
        return $this->hasOne(Operator::class, 'education_level_id', 'id');
    }
}
