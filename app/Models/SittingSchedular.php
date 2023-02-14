<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class SittingSchedular extends Model
{
    use HasFactory;

    protected $fillable = ['time_tables_id', 'date'];

    public function venueSittingSchedule(): HasMany
    {
        return $this->hasMany(VenueSittingSchedular::class);
    }

    public function timeTable(): HasOne
    {
        return $this->hasOne(TimeTable::class);
    }

}
