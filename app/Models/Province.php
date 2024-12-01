<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    use HasFactory;

    protected $fillable = ['code', 'nom', 'adresse', 'adresse_tel', 'employees_count'];



    public function employees()
    {
        return $this->hasMany(Employee::class);
    }



}
