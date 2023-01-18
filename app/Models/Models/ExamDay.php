<?php

namespace App\Models\Models;

class ExamDay
{
    private string $date;
    private string $weekDay;
    private array $exams;

    /**
     * @param string $date
     * @param string $weekDay
     */
    public function __construct(string $date, string $weekDay)
    {
        $this->date = $date;
        $this->weekDay = $weekDay;
    }

    /**
     * @return string
     */
    public function getDate(): string
    {
        return $this->date;
    }

    /**
     * @param string $date
     */
    public function setDate(string $date): void
    {
        $this->date = $date;
    }

    /**
     * @return string
     */
    public function getWeekDay(): string
    {
        return $this->weekDay;
    }

    /**
     * @param string $weekDay
     */
    public function setWeekDay(string $weekDay): void
    {
        $this->weekDay = $weekDay;
    }

    /**
     * @return array
     */
    public function getExams(): array
    {
        return $this->exams;
    }

    /**
     * @param Exam $exam
     */
    public function addExams(Exam $exam): void
    {
        $this->exams[] = $exam;
    }


}
