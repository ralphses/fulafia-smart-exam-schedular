<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class ExamUnit extends Model
{
    use HasFactory;

    protected $fillable = [
        'exam_center_id',
        'exams_id',
    ];

    public function exam(): BelongsTo
    {
        return $this->belongsTo(Exams::class);
    }

    public function course(): HasOne
    {
        return $this->hasOne(Course::class);
    }

    public function examCenter(): HasOne
    {
        return $this->hasOne(ExamCenters::class);
    }

    public function examUnitSchedule(): HasMany
    {
        return $this->hasMany(ExamUnitSchedule::class, 'exam_units_id');
    }
}
