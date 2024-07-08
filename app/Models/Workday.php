<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Workday extends Model
{
    use HasFactory;

    protected $fillable = [
        'date_start',
        'lunch_star',
        'lunch_end',
        'date_end',
        'user_id'
    ];
}
