<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tire extends Model
{
    use HasFactory;
    protected $fillable = [
        'tire_code',
        'brand',
        'size',
        'status',
        'running_km',
        'running_hours',
        'quantity',
        'location'
    ];
}
