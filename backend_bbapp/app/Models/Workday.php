<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Workday extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'date_start',
        'lunch_start',
        'lunch_end',
        'date_end'
    ];

    public function employees()
    {
        return $this->belongsToMany(Employee::class, "user_workdays");
    }

    public function users()
    {
        return $this->belongsToMany(User::class, "user_workdays");
    }
}
