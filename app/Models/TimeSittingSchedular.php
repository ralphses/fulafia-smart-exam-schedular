<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TimeSittingSchedular extends Model
{
    use HasFactory;

    protected $fillable = ['venue_sitting_schedular_id', 'time_slot', 'students'];

    public function venueSittingScheduler(): BelongsTo
    {
        return $this->belongsTo(VenueSittingSchedular::class);
    }

}
