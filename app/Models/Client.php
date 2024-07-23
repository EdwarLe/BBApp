<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'client_name',
        'client_surname',
        'phone_number',
        'address',
        'company_name'
    ];

    public function quotations()
    {
        return $this->hasMany('App\Models\Quotation');
    }
}
