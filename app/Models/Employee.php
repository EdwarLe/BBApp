<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'job',
        'first_name',
        'surname',
        'id_type',
        'id_number',
        'salary'
    ];

    public function workdays()
    {
        return $this->belongsToMany(Workday::class, "user_workdays");
    }
}
