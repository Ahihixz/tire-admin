<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Lifetime extends Model
{
    use HasFactory;

    protected $table = 'lifetimes';

    protected $fillable = [
        'tire_id',
        'hm_install',
        'hm_current',
        'km_install',
        'km_current',
        'max_lifetime_hm',
        'max_lifetime_km',
        'average_hm_per_day',
        'status',
        'estimated_scrap_date',
        'notes',
    ];

    protected $appends = [
        'used_hm',
        'remaining_hm',
        'lifetime_percentage',
        'status',
        'remaining_days',
        'estimated_scrap_date'
    ];

    public function tire()
    {
        return $this->belongsTo(Tire::class);
    }

    public function getUsedHmAttribute()
    {
        return max(0, $this->hm_current - $this->hm_install);
    }

    public function getRemainingHmAttribute()
    {
        return max(0, $this->max_lifetime_hm - $this->used_hm);
    }

    public function getLifetimePercentageAttribute()
    {
        if ($this->max_lifetime_hm <= 0) {
            return 0;
        }

        return round(
            ($this->used_hm / $this->max_lifetime_hm) * 100,
            2
        );
    }

    public function getStatusAttribute()
    {
        $percent = $this->lifetime_percentage;

        if ($percent >= 100) {
            return 'SCRAP';
        }

        if ($percent >= 90) {
            return 'CRITICAL';
        }

        if ($percent >= 80) {
            return 'WARNING';
        }

        return 'GOOD';
    }

    public function getRemainingDaysAttribute()
    {
        if ($this->average_hm_per_day <= 0) {
            return null;
        }

        return ceil(
            $this->remaining_hm / $this->average_hm_per_day
        );
    }

    public function getEstimatedScrapDateAttribute()
    {
        if (!$this->remaining_days) {
            return null;
        }

        return now()->addDays($this->remaining_days)
                    ->format('Y-m-d');
    }
}
