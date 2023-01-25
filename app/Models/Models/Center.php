<?php

namespace App\Models\Models;

class Center
{
    private int $id;
    private int $capacity;
    private int $freeSpace;
    private string $name;
    private bool $filled;

    /**
     * @param int $id
     * @param string $name
     * @param int $capacity
     */
    public function __construct(int $id, string $name, int $capacity)
    {
        $this->id = $id;
        $this->name = $name;
        $this->capacity = $capacity;
        $this->freeSpace = $capacity;
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
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return int
     */
    public function getCapacity(): int
    {
        return $this->capacity;
    }

    /**
     * @param int $capacity
     */
    public function setCapacity(int $capacity): void
    {
        $this->capacity = $capacity;
    }

    /**
     * @return int
     */
    public function getFreeSpace(): int
    {
        return $this->freeSpace;
    }

    /**
     * @param int $freeSpace
     */
    public function setFreeSpace(int $freeSpace): void
    {
        $this->freeSpace = $freeSpace;
    }

    /**
     * @return bool
     */
    public function isFilled(): bool
    {
        return $this->filled;
    }

    /**
     * @param bool $filled
     */
    public function setFilled(bool $filled): void
    {
        $this->filled = $filled;
    }





}
