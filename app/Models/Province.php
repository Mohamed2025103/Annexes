<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    use HasFactory;

     protected $fillable = [
        'province_name',  // Add province_name here
        'region_id',      // If you have a region_id, add it here as well
        'city_id',
    ];

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function employees()
    {
        return $this->hasMany(Employee::class);
    }

    public function region()
    {
        return $this->belongsTo(Region::class);
    }


}
