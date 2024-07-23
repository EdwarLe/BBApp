<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Miscellaneous extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'miscellaneous_name',
        'quantity',
        'price',
        'change_measurement',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsToMany(User::class, "miscellaneous_users");
    }
}
