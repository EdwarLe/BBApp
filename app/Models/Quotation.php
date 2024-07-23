<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Quotation extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'quantity',
        'description',
        'price',
        'advance_percentage',
        'remaining_percentage',
        'is_sales',
        'client_id',
    ];

    public function client()
    {
        return $this->belongsTo('App\Models\Client');
    }

    public function sale()
    {
        return $this->hasOne('App\Models\Sales');
    }

    public function services()
    {
        return $this->belongsToMany(Service::class, "service_quotations");
    }

    public function users()
    {
        return $this->belongsToMany(User::class, "quotation_users");
    }
}
