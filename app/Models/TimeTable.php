<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TimeTable extends Model
{
    use HasFactory;

    protected $fillable = [
        'exam_days',
        'instructions',
        'filePath',
        'stop_date',
        'start_date',
        'session',
        'semester',
        'school_name',
        'school_id'
    ];

    public function school(): BelongsTo
    {
        return $this->belongsTo(School::class);
    }
}