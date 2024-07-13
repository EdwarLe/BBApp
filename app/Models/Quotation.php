<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quotation extends Model
{
    use HasFactory;

    protected $fillable = array("*");

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
