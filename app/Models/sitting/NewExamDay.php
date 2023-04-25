<?php

namespace App\Models\sitting;

class NewExamDay {

    public int $id;
    public string $weekDay;
    public string $date;

    public function __construct(int $id, string $weekDay, string $date) 
    {
        $this->id = $id;
        $this->weekDay = $weekDay;
        $this->date = $date;
    }

}