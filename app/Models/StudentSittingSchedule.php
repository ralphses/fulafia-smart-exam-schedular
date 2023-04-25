<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StudentSittingSchedule extends Model
{
    use HasFactory;

    protected $fillable = ['course_code', 'venue', 'time_slot', 'exam_date', 'student_matric', 'seat_no', 'time_table_id'];

    public function timetable() : BelongsTo {
        return $this->belongsTo(TimeTable::class, 'time_table_id');
    }

}
