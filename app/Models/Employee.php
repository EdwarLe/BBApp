<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    public $table = "employee";
    protected $fillable = ("*");

    public function workdays()
    {
        return $this->belongsToMany(Quotation::class, "user_workdays");
    }
}
