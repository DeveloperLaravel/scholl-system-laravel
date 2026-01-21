<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FuelFill extends Model
{
    use HasFactory;
     protected $fillable = [
        'vehicle_id',
        'station_id',
    ];

     protected $casts = [
        'filled_at' => 'datetime',
    ];

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }
    
}
