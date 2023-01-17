<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Exams extends Model
{
    use HasFactory;

    protected $fillable = [
        'time_slot_id',
        'exam_day_id',
    ];

    public function examDay(): BelongsTo
    {
        return $this->belongsTo(ExamDay::class);
    }

    public function examUnits(): HasMany
    {
        return $this->hasMany(ExamUnit::class);
    }

    public function timeSlot(): HasOne
    {
        return $this->hasOne(TimeSlot::class);
    }
}
