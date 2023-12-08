<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

     /**
     * The many-to-many relationship with YearLevel.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function yearLevels()
    {
        return $this->belongsToMany(YrLevel::class);
    }
}
