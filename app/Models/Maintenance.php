<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\Tire;

class Maintenance extends Model
{
    protected $fillable = [
        'tire_id',
        'maintenance_date',
        'description',
    ];

    protected $casts = [
        'maintenance_date' => 'date',
    ];

    public function tire()
    {
        return $this->belongsTo(Tire::class);
    }
}
