<?php

namespace App\Models\Models;

class ExamUnit
{
    private string $venue;
    private array $courses;

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
     * @return array
     */
    public function getCourses(): array
    {
        return $this->courses ?? [];
    }

    /**
     * @param int $courseId
     */
    public function addCourses(int $courseId): void
    {
        $this->courses[] = $courseId;
    }





}
