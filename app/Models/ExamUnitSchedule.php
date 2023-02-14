<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ExamUnitSchedule extends Model
{
    use HasFactory;

    protected $fillable = ['exam_units_id', 'course_id', 'students'];

    public function examUnit(): BelongsTo
    {
        return $this->belongsTo(ExamUnit::class);
    }
}
