<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = array("*");

    public function quotations()
    {
        return $this->hasMany('App\Models\Quotation');
    }
}
