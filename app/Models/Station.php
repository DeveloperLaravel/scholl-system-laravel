<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Station extends Model
{
    use HasFactory;
        protected $fillable = ['name', 'location'];

// Station.php
  public function vehicles()
    {
        return $this->hasMany(Vehicle::class);
    }
public function fuelFills() { 
    return $this->hasMany(FuelFill::class); 
    }
    
    public function users() {
        return $this->hasMany(User::class);
    }
}
  