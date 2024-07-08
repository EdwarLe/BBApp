<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    use HasFactory;

    protected $fillable = [
        'start_date',
        'end_date',
        'quotation_id',
        'advance',
        'remaining_payment',
        'user_id'
    ];
}
