<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supply extends Model
{
    use HasFactory;

    protected $fillable = [
        'supply_name',
        'quantity',
        'price',
        'change_measurement',
        'user_id'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, "supply_users");
    }
}
