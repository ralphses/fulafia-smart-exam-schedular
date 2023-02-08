<?php

namespace App\Models\Models;

use App\Models\ExamCenters;

class ExamUnit
{
    private ExamCenters $venue;
    private array $courses;
    private array $venueCourseStudent;

    /**
     * @return ExamCenters
     */
    public function getVenue(): ExamCenters
    {
        return $this->venue;
    }

    /**
     * @param ExamCenters $venue
     */
    public function setVenue(ExamCenters $venue): void
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
        $this->courses[] = \App\Models\Course::find($courseId);
    }

    /**
     * @return array
     */
    public function getVenueCourseStudent(): array
    {
        return $this->venueCourseStudent;
    }

    /**
     * @param VenueCourseStudent $venueCourseStudent
     */
    public function addCourseStudent(VenueCourseStudent $venueCourseStudent): void
    {
        $this->venueCourseStudent[] = $venueCourseStudent;
    }



}
