<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'id_number',
        'phone_number',
        'Employee_Area',
        'city_id',
        'province_id',
    ];


    public function province()
    {
        return $this->belongsTo(Province::class);
    }
}
