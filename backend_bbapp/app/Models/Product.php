<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'quantity',
        'height',
        'width',
        'page_quantity',
        'print_type',
        'id'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, "product_users");
    }

    public function services()
    {
        return $this->belongsToMany(Service::class, "products_services");
    }
}
