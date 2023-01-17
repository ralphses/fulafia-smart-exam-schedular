<?php

namespace App\Models\Models;

class ExamDay
{
    /**
     * @var string
     */
    private string $date;
    /**
     * @var string
     */
    private string $weekDay;

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




}
