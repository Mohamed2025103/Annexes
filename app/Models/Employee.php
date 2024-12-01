<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',            // Added Code
        'first_name',
        'last_name',
        'phone_number',
        'address',         // Replaced Employee_Area with Address
        'cin',             // Added CIN
        'province_id',
        'picture',
    ];

    // Define relationship with Province
    public function province()
    {
        return $this->belongsTo(Province::class);
    }
}
