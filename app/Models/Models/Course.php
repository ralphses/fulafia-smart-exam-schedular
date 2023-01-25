<?php

namespace App\Models\Models;

class Course
{
    private int $id;
    private array $students;
    private string $title;
    private bool $assigned;
    private bool $general;

    /**
     * @param int $id
     * @param array $students
     * @param string $title
     * @param bool $assigned
     */
    public function __construct(int $id, array $students, string $title, bool $assigned, bool $general)
    {
        $this->id = $id;
        $this->students = $students;
        $this->title = $title;
        $this->assigned = $assigned;
        $this->general = $general;
    }


    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * @return bool
     */
    public function isAssigned(): bool
    {
        return $this->assigned;
    }

    /**
     * @param bool $assigned
     */
    public function setAssigned(bool $assigned): void
    {
        $this->assigned = $assigned;
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
     * @return bool
     */
    public function isGeneral(): bool
    {
        return $this->general;
    }

    /**
     * @param bool $general
     */
    public function setGeneral(bool $general): void
    {
        $this->general = $general;
    }




}
