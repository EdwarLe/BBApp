<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Workday extends Model
{
    use HasFactory;

    public $table = "workday";
    protected $fillable = ("*");

    public function employees()
    {
        return $this->belongsToMany(Employee::class, "user_workdays");
    }

    public function users()
    {
        return $this->belongsToMany(User::class, "user_workdays");
    }
}
