<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    use HasFactory;

    protected $fillable = array("*");

    public function quotation()
    {
        return $this->belongsTo('App\Models\Quotation');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
