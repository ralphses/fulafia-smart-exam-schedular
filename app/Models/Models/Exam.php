<?php

namespace App\Models\Models;

class Exam
{
    private string $timeSlot;
    private array $examUnits;
    private array $students;


    /**
     * @param array $students
     * @param array $examUnits
     */
    public function __construct(array $examUnits)
    {
        $this->examUnits = $examUnits;
    }

    /**
     * @return array
     */
    public function getExamUnits(): array
    {
        return $this->examUnits;
    }

    /**
     * @param array $examUnits
     */
    public function setExamUnits(array $examUnits): void
    {
        $this->examUnits = $examUnits;
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
     * @param array $students
     */
    public function addStudents(array $students): void
    {
        $this->students = $students;
    }

    /**
     * @return string
     */
    public function getTimeSlot(): string
    {
        return $this->timeSlot;
    }

    /**
     * @param string $timeSlot
     */
    public function setTimeSlot(string $timeSlot): void
    {
        $this->timeSlot = $timeSlot;
    }



}
