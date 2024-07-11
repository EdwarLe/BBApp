<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class supply extends Model
{
    use HasFactory;

    public $table = "supply";
    protected $fillable = ("*");

    public function users()
    {
        return $this->belongsToMany(User::class, "supply_users");
    }
}
