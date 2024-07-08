<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quotation extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id',
        'company_name',
        'quantity',
        'description',
        'service_id',
        'price',
        'advance_percentage',
        'remaining_percentage',
        'is_sales',
        'user_id'
    ];
}
