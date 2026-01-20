<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
class Vehicle extends Model
{
    use HasFactory;
   protected $fillable = [
        'plate_number',
        'chassis_number',
        'owner_name',
        'owner_nationality',
        'qr_code',
        'station_id',
    ];

    /* =====================
     |  Relationships
     ===================== */

 
    protected static function booted()
    {
        static::creating(function ($vehicle) {
            $vehicle->qr_code = 'CAR-' . Str::uuid();
        });
    }
    public function station()
{
    return $this->belongsTo(Station::class);
}
        public function fuelings()
    {
        return $this->hasMany(FuelFill::class);
    }
}
