<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    public $table = "service";
    protected $fillable = ("*");

    public function quotations()
    {
        return $this->belongsToMany(Quotation::class, "servie_quotations");
    }

    public function users()
    {
        return $this->belongsToMany(User::class, "servie_users");
    }
}
