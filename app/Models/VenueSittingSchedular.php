<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class VenueSittingSchedular extends Model
{
    use HasFactory;

    protected $fillable = ['sitting_schedular_id', 'venue_code'];

    public function timeSittingScheduler(): HasMany
    {
        return $this->hasMany(TimeSittingSchedular::class, 'venue_sitting_schedulars_id');
    }

    public function sittingScheduler(): BelongsTo
    {
        return $this->belongsTo(SittingSchedular::class);
    }
}
