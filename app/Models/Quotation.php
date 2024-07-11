<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quotation extends Model
{
    use HasFactory;

    public $table = "quotation";
    protected $fillable = array("*");

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function sale()
    {
        return $this->hasOne(Sales::class);
    }

    public function services()
    {
        return $this->belongsToMany(Service::class, "servie_quotations");
    }

    public function users()
    {
        return $this->belongsToMany(User::class, "quotation_users");
    }
}
