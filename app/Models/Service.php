<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'service_name',
        'quantity',
        'price',
        'currency',
        'user_id',
        'id'
    ];

    public function quotations()
    {
        return $this->belongsToMany(Quotation::class, "service_quotations");
    }

    public function users()
    {
        return $this->belongsToMany(User::class, "service_users");
    }
}
