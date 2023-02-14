<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ExamDay extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'week_day',
        'time_table_id',
    ];

    protected $table = 'exam_day';

    public function timeTable(): BelongsTo
    {
        return $this->belongsTo(TimeTable::class);
    }

    public function exams(): HasMany
    {
        return $this->hasMany(Exams::class);
    }
}
