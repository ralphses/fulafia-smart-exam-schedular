<?php

namespace App\Models\Models;

class VenueCourseStudent
{
    private int $courseCode;
    private array $students;

    /**
     * @param int $courseCode
     * @param array $requiredStudents
     */
    public function __construct(int $courseCode, array $requiredStudents)
    {
        $this->courseCode = $courseCode;
        $this->students = $requiredStudents;
    }

    /**
     * @return int
     */
    public function getCourseCode(): int
    {
        return $this->courseCode;
    }

    /**
     * @param int $courseCode
     */
    public function setCourseCode(int $courseCode): void
    {
        $this->courseCode = $courseCode;
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
}
