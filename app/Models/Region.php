<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    use HasFactory;

    public function cities()
    {
        return $this->hasMany(City::class);
    }

    // In app/Models/Region.php
protected $fillable = ['region_name'];


    public function provinces()
    {
        return $this->hasMany(Province::class);
    }
}
