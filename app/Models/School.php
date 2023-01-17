<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class School extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'user_id',
        'email',
        'website',
        'address',
        'logo',
        'active',
    ];

    public function faculties(): HasMany
    {
        return $this->hasMany(Faculty::class);
    }

    public function timeSlots(): HasMany {
        return $this->hasMany(TimeSlot::class);
    }

    public function examCenters() : HasMany {
        return $this->hasMany(ExamCenters::class);
    }

    public function timetables(): HasMany
    {
        return $this->hasMany(TimeTable::class);
    }
}
