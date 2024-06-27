<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class EducationLevel extends Model
{
    use HasFactory;

    protected $guarded = ['education_level_id'];

    protected $primaryKey = 'education_level_id';

    /**
     * Get the teacher associated with the EducationLevel
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function teacher(): HasOne
    {
        return $this->hasOne(Teacher::class, 'education_level_id', 'id');
    }
}
