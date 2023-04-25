<?php

namespace App\Models\sitting;

class Exams { 
    public int $id;
    public int $examsDayId;
    public string $timeSlot;
    public array $students;
}