<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Miscellaneous extends Model
{
    use HasFactory;

    public $table = "miscellaneou";
    protected $fillable = array("*");

    public function user()
    {
        return $this->belongsToMany(User::class, "miscellaneous_users");
    }
}
