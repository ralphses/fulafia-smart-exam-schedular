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
        'week_ay',
        'time_table_id',
    ];

    public function timeTable(): BelongsTo
    {
        return $this->belongsTo(TimeTable::class);
    }

    public function exams(): HasMany
    {
        return $this->hasMany(Exams::class);
    }
}
