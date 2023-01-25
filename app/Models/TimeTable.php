<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TimeTable extends Model
{
    use HasFactory;

    protected array $timeSlots;
    protected array $students;
    protected array $examDays;

    protected $fillable = [
        'exam_days',
        'instructions',
        'planner',
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

    public function examDay(): HasMany
    {
        return $this->hasMany(ExamDay::class);
    }

    /**
     * @return array
     */
    public function getTimeSlots(): array
    {
        return $this->timeSlots;
    }

    /**
     * @param array $timeSlots
     */
    public function setTimeSlots(array $timeSlots): void
    {
        $this->timeSlots = $timeSlots;
    }

    /**
     * @return array
     */
    public function getStudents(): array
    {
        return $this->students;
    }

    /**
     * @param array $students
     */
    public function setStudents(array $students): void
    {
        $this->students = $students;
    }

    /**
     * @return array
     */
    public function getExamDays(): array
    {
        return $this->examDays;
    }

    /**
     * @param Models\ExamDay $examDay
     * @return void
     */
    public function addExamDays(\App\Models\Models\ExamDay $examDay): void
    {
        $this->examDays[] = $examDay;
    }

    /**
     * @param array $examDays
     */
    public function setExamDays(array $examDays): void
    {
        $this->examDays = $examDays;
    }



}
