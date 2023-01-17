<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Faculty extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'school_id',
        'active',
    ];

    protected $hidden = [
        'school_id',
        'date_created',
        'date_updated',
    ];


    public function students(): HasMany
    {
        return $this->hasMany(Student::class);
    }

    public function departments(): HasMany
    {
        return $this->hasMany(Department::class);
    }
}
