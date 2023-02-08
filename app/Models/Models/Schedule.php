<?php

namespace App\Models\Models;

use Illuminate\Support\Collection;

class Schedule
{

    private string $courseCode;
    private string $venue;
    private string $timeSlot;
    private string $examDate;
    private bool $done;
    private int $noOfStudents;
    private Collection $students;

    /**
     * @param string $courseCode
     * @param string $venue
     * @param string $timeSlot
     * @param string $examDate
     * @param int $noOfStudents
     * @param array $students
     */
    public function __construct(string $courseCode, string $venue, string $timeSlot, string $examDate, int $noOfStudents, array $students)
    {
        $this->courseCode = $courseCode;
        $this->venue = $venue;
        $this->timeSlot = $timeSlot;
        $this->examDate = $examDate;
        $this->noOfStudents = $noOfStudents;
        $this->students = collect($students);
        $this->done = false;
    }


    /**
     * @return string
     */
    public function getCourseCode(): string
    {
        return $this->courseCode;
    }

    /**
     * @param string $courseCode
     */
    public function setCourseCode(string $courseCode): void
    {
        $this->courseCode = $courseCode;
    }

    /**
     * @return string
     */
    public function getVenue(): string
    {
        return $this->venue;
    }

    /**
     * @param string $venue
     */
    public function setVenue(string $venue): void
    {
        $this->venue = $venue;
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

    /**
     * @return int
     */
    public function getNoOfStudents(): int
    {
        return $this->noOfStudents;
    }

    /**
     * @param int $noOfStudents
     */
    public function setNoOfStudents(int $noOfStudents): void
    {
        $this->noOfStudents = $noOfStudents;
    }

    /**
     * @return array
     */
    public function getStudents(): array|Collection
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
     * @return string
     */
    public function getExamDate(): string
    {
        return $this->examDate;
    }

    /**
     * @param string $examDate
     */
    public function setExamDate(string $examDate): void
    {
        $this->examDate = $examDate;
    }

    /**
     * @return bool
     */
    public function isDone(): bool
    {
        return $this->done;
    }

    /**
     * @param bool $done
     */
    public function setDone(bool $done): void
    {
        $this->done = $done;
    }



}
